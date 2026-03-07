<?php

class Horloge
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = 'SELECT   HRL.Id
                        ,HRL.Merk
                        ,HRL.Model
                        ,HRL.Prijs
                        ,HRL.Materiaal
                        ,HRL.Diameter
                        ,HRL.Beweging
                        ,HRL.Releasedatum
                FROM    Horloges as HRL
                ORDER BY HRL.Prijs DESC
                        ,HRL.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM Horloges
        WHERE Id = :id';

        $this->db->query($sql);

        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}
