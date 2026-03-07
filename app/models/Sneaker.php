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
        $sql = 'SELECT   SNKR.Id
                        ,SNKR.Merk
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

    public function delete($id)
    {
        $sql = 'DELETE FROM Sneakers
        WHERE Id = :id';

        $this->db->query($sql);

        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}