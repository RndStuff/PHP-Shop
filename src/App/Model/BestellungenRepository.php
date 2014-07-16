<?php

namespace App\Model;

use App\PDO;
use App\WarenRepository;

class BestellungenRepository
{
    /**
     * @var PDO
     */
    private $pdo;
    /**
     * @var WarenRepository
     */
    private $warenRepository;

    public function __construct(PDO $pdo, WarenRepository $warenRepository)
    {
        $this->pdo = $pdo;
        $this->warenRepository = $warenRepository;
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM tbl_bestellung';
        $result = $this->pdo->query($sql);
        $bestllungen = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $bestllungen[] = $this->createFromArray($row);
        }
        return $bestllungen;
    }

    public function getById($id)
    {
        $sql = 'SELECT * FROM tbl_bestellung WHERE id ='.intval($id);
        $result = $this->pdo->query($sql);
        return $this->createFromArray($result->fetchColumn());
    }

    protected function createFromArray(array $row)
    {
        $bestellung = new Bestellung();
        $bestellung->setId($row['id']);
        $bestellung->setTime($row['timestamp']);
        $bestellung->setLand($row['land']);
        $bestellung->setZusatz($row['zusatz']);
        $bestellung->setVersandArt($row['versandArt']);
        $bestellung->setName($row['name']);
        $bestellung->setOrt($row['ort']);
        $bestellung->setEmail($row['email']);
        $bestellung->setPlz($row['plz']);
        $bestellung->setStr($row['str']);

        $sql = 'SELECT * FROM tbl_artikel_bestellungen WHERE bestellung_id = '.$bestellung->getId();
        $result = $this->pdo->query($sql);
        while ($innerRow = $result->fetch(PDO::FETCH_ASSOC)) {
            $bestellung->addWare($this->warenRepository->getWareById($innerRow['artikel_id']));
        }
        return $bestellung;
    }
}
 