<?php

namespace App;

use App\Model\BestellungenRepository;
use App\Model\Ware;
use App\Model\WarenRepository;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

define('ROOT_PATH', __DIR__ . '/../..');

class Application
{
    public $conf = array();
    private $pdo;
    private $logger;
    private $warenRepository;
    private $bestellungenRepository;
    private $warenkorb;

    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';


    public function __construct()
    {
        session_start();
        $this->loadConfig();
    }


    public function getPdo()
    {
        if (!$this->pdo) {
            $this->pdo = new PDO(
                $this->conf['pdo']['dsn'],
                $this->conf['pdo']['user'],
                $this->conf['pdo']['pass']
            );
            $this->pdo->setLogger($this->getLogger());
        }
        return $this->pdo;
    }


    public function render($template, array $context = array())
    {
        $context['app'] = $this;
        foreach ($context as $key => $value) {
            $$key = $value;
        }
        require_once(__DIR__.'/Views/header.php');
        require_once(__DIR__.'/Views/'.$template);
        require_once(__DIR__.'/Views/footer.php');
        exit;
    }

    public function getWarenkorb()
    {
        if (!$this->warenkorb) {
            $this->warenkorb = new Warenkorb();
        }
        return $this->warenkorb;
    }


    public function getWarenRepository()
    {
        if (!$this->warenRepository) {
            $this->warenRepository = new WarenRepository($this->getPdo());
        }

        return $this->warenRepository;
    }

    public function getBestellungenRepository()
    {
        if (!$this->bestellungenRepository) {
            $this->bestellungenRepository = new BestellungenRepository(
                $this->getPdo(),
                $this->getWarenRepository()
            );
        }
        return $this->bestellungenRepository;
    }
    /**
     * @deprecated use WarenRepository instead
     * @return Ware[]
     */
    public function getWaren()
    {
        return $this->getWarenRepository()->getAllWaren();
    }

    public function redirect($url)
    {
        header('location: '.$url);
        exit(1);
    }

    public function addNotification($text, $type = self::TYPE_INFO)
    {
        $_SESSION['app.notifications'][] = array(
            'type' => $type,
            'body' => $text
        );
    }

    public function getNotifications()
    {
        $result = array();
        if (is_array($_SESSION['app.notifications'])) {
            $result = $_SESSION['app.notifications'];
        }
        $_SESSION['app.notifications'] = array();
        return $result;
    }

    protected function loadConfig()
    {
        $this->conf = require(ROOT_PATH . '/config/config.php');
    }

    public function validateEmail($email)
    {
        $pattern = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
        return (bool) preg_match($pattern, $email);
    }

    public function mail($to, $subject, $message)
    {
        if (mail($to, $subject, $message)) {
            $this->getLogger()->addError('Sending mail to '.$to.' failed Subject: '.$subject);
            return false;
        } else {
            $this->getLogger()->addDebug('Email to '.$to. 'successful');
            return true;
        }
    }

    private function getLogger()
    {
        if (!$this->logger) {
            $this->logger = new Logger('PHP-Shop');
            $this->logger->pushHandler(new StreamHandler(ROOT_PATH.'/log/main.log', Logger::INFO));
        }
        return $this->logger;
    }
}
