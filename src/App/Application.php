<?php

namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Twig_Environment;
use Twig_Loader_Filesystem;

define('ROOT_PATH', __DIR__ . '/../..');

class Application
{
    public $conf = array();
    private $pdo;
    private $twig;
    private $env;
    private $logger;
    private $warenkorb;

    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';


    public function __construct($env = 'dev')
    {
        session_start();
        $this->loadConfig($env);
        $this->env = $env;
    }

    public function getEnv()
    {
        return $this->env;
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

    public function getTwig()
    {
        if (!$this->twig) {
            $loader = new Twig_Loader_Filesystem(__DIR__ . '/Views');
            $this->twig = new Twig_Environment($loader, array(
#                  'cache' => ROOT_PATH.'/tmp/twig/',
            ));
        }
        return $this->twig;
    }

    public function render($template, array $context = array())
    {
        $context['app'] = $this;
        echo $this->getTwig()->render($template, $context);
        exit(1);
    }

    public function getWarenkorb()
    {
        if (!$this->warenkorb) {
            $this->warenkorb = new Warenkorb();
        }
        return $this->warenkorb;
    }

    /**
     * @return Ware[]
     */
    public function getWaren()
    {
        $sql = 'SELECT * FROM tbl_artikel';
        $result = $this->getPdo()->query($sql);
        $waren = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $waren[$row['id']] = new Ware(
                $row['id'],
                $row['bezeichnung'],
                $row['preis'],
                $row['beschreibung']
            );
        }
        return $waren;
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

    protected function loadConfig($env)
    {
        $this->conf = require(ROOT_PATH . '/config/' . $env . '.php');
    }

    public function validateEmail($email)
    {
        $pattern = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
        return (bool) preg_match($pattern, $email);
    }

    public function mail($string, $string1, $string2)
    {
        $this->addNotification('TODO implemt app::mail');
        return true;
    }

    private function getLogger()
    {
        if (!$this->logger) {
            $this->logger = new Logger('PHP-Shop');
            $this->logger->pushHandler(new StreamHandler(ROOT_PATH.'/log/'.$this->getEnv().'.log', Logger::INFO));
        }
        return $this->logger;
    }
} 