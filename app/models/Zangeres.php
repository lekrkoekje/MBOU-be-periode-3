<?php

class Zangeres
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        $sql = 'SELECT   ZNG.Id
                        ,ZNG.Naam
                        ,ZNG.Nationaliteit
                        ,ZNG.Nettowaarde
                        ,ZNG.Geboortedatum
                        ,ZNG.BekendsteHit
                FROM    Zangeressen as ZNG
                ORDER BY ZNG.Nettowaarde DESC
                        ,ZNG.Naam ASC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM Zangeressen
        WHERE Id = :id';

        $this->db->query($sql);

        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}
