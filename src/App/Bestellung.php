<?php


namespace App;

class Bestellung
{
    private $id;
    private $time;
    private $email;
    private $name;
    private $zusatz;
    private $str;
    private $ort;
    private $land;
    private $plz;
    private $versandArt;
    private $zahlungsMethode;
    private $waren;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getZusatz()
    {
        return $this->zusatz;
    }

    public function setZusatz($zusatz)
    {
        $this->zusatz = $zusatz;
    }

    public function getStr()
    {
        return $this->str;
    }

    public function setStr($str)
    {
        $this->str = $str;
    }

    public function getOrt()
    {
        return $this->ort;
    }

    public function setOrt($ort)
    {
        $this->ort = $ort;
    }

    public function getLand()
    {
        return $this->land;
    }

    public function setLand($land)
    {
        $this->land = $land;
    }

    public function getPlz()
    {
        return $this->plz;
    }

    public function setPlz($plz)
    {
        $this->plz = $plz;
    }

    public function getVersandArt()
    {
        return $this->versandArt;
    }

    public function setVersandArt($versandArt)
    {
        $this->versandArt = $versandArt;
    }

    public function getZahlungsMethode()
    {
        return $this->zahlungsMethode;
    }

    public function setZahlungsMethode($zahlungsMethode)
    {
        $this->zahlungsMethode = $zahlungsMethode;
    }

    /**
     * @return Ware[]
     */
    public function getWaren()
    {
        return $this->waren;
    }

    public function addWare(Ware $ware)
    {
        $this->waren[$ware->getId()] = $ware;
    }

}
 