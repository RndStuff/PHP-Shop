<?php

namespace App\Model;

class Ware
{
    private $id;
    private $bezeichnung;
    private $preis;
    private $beschreibung;

    public function __construct($id, $bezeichnung, $preis, $beschreibung)
    {
        $this->id = $id;
        $this->bezeichnung = $bezeichnung;
        $this->preis = $preis;
        $this->beschreibung = $beschreibung;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    public function getPreis()
    {
        return $this->preis;
    }

    public function getBeschreibung()
    {
        return $this->beschreibung;
    }
}
