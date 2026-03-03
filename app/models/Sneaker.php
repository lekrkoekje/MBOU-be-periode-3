<?php

class Sneaker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT  SNKR.Merk
                        ,SNKR.Model
                        ,SNKR.Type
                        ,SNKR.Prijs
                        ,SNKR.Materiaal
                        ,CONCAT(SNKR.Gewicht, " gram") as Gewicht
                        ,SNKR.Releasedatum
                FROM    Sneakers as SNKR
                ORDER BY SNKR.Type ASC
                        ,SNKR.Prijs DESC
                        ,SNKR.Gewicht DESC
                        ,SNKR.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}