<?php

namespace App;

use App\Model\Ware;

class Warenkorb
{

    public function __construct($sessionKey = 'app.warenkorb')
    {
        $this->key = $sessionKey;
    }

    public function addWare(Ware $ware)
    {
        $_SESSION[$this->key][$ware->getId()] = $ware;
    }

    /**
     * @return Ware[]
     */
    public function getWaren()
    {
        return $_SESSION[$this->key];
    }

    public function getPreis()
    {
        $preis = 0;
        foreach ($this->getWaren() as $ware) {
            $preis += $ware->getPreis();
        }
        return $preis;
    }

    public function count()
    {
        return count($this->getWaren());
    }

    public function rmWare(Ware $ware)
    {
        return $this->rmWareById($ware->getId());
    }

    public function rmWareById($id)
    {
        if ($this->contains($id)) {
            unset($_SESSION[$this->key][$id]);
            return true;
        }
        return false;
    }

    public function contains($id)
    {
        return isset($_SESSION[$this->key][$id]);
    }
}
