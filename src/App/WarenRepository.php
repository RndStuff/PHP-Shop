<?php

namespace App;

class WarenRepository
{

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $id
     * @return Ware
     */
    public function getWareById($id)
    {
        $sql = 'SELECT * FROM tbl_artikel WHERE id = '.intval($id);
        $result = $this->pdo->query($sql);
        if ($row = $result->fetchColumn()) {
            return self::createWareFromArray($row);
        }
        $ware = null;
    }

    /**
     * @return Ware[]
     */
    public function getAllWaren()
    {
        $sql = 'SELECT * FROM tbl_artikel';
        $waren = array();
        $result = $this->pdo->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $waren[] = self::createWareFromArray($row);
        }
        return $waren;
    }

    /**
     * TODO implement
     * @param Ware $ware
     * @return bool
     */
    public function insert(Ware $ware)
    {
        return false;
    }

    /**
     * @return int
     */
    public function count()
    {
        $sql = 'SELECT id FROM tbl_artikel';
        return $this->pdo->query($sql)->rowCount();
    }

    protected static function createWareFromArray($array)
    {
        return new Ware(
            $array['id'],
            $array['bezeichnung'],
            $array['preis'],
            $array['beschreibung']
        );
    }
}
 