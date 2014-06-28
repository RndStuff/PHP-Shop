<?php

namespace App;

use Monolog\Logger;

class PDO extends \PDO
{
    /** @var Logger */
    private $logger;

    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function exec($statement)
    {
        $this->logger->addInfo('PDO.exec: '.$statement);
        return parent::exec($statement);
    }
}
