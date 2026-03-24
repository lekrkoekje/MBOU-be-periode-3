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
                        ,DATE_FORMAT(ZNG.Geboortedatum, "%d/%m/%Y") as Geboortedatum
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

    public function create($data)
    {
        $sql = "INSERT INTO Zangeressen ( Naam
                                        ,Nationaliteit
                                        ,Nettowaarde
                                        ,Geboortedatum
                                        ,BekendsteHit
                                        )
                VALUES (:naam,
                        :nationaliteit,
                        :nettowaarde,
                        :geboortedatum,
                        :bekendstehit)";

        $this->db->query($sql);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':nationaliteit', $data['nationaliteit'], PDO::PARAM_STR);
        $this->db->bind(':nettowaarde', $data['nettowaarde'], PDO::PARAM_INT);
        $this->db->bind(':geboortedatum', $data['geboortedatum'], PDO::PARAM_STR);
        $this->db->bind(':bekendstehit', $data['bekendstehit'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getZangeresById($id)
    {
        $sql = 'SELECT   ZNG.Id
                        ,ZNG.Naam
                        ,ZNG.Nationaliteit
                        ,ZNG.Nettowaarde
                        ,ZNG.Geboortedatum
                        ,ZNG.BekendsteHit
                FROM    Zangeressen as ZNG
                WHERE   ZNG.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateZangeres($request)
    {
        $sql = 'UPDATE Zangeressen as ZNG
                    SET     ZNG.Naam = :naam
                            ,ZNG.Nationaliteit = :nationaliteit
                            ,ZNG.Nettowaarde = :nettowaarde
                            ,ZNG.Geboortedatum = :geboortedatum
                            ,ZNG.BekendsteHit = :bekendstehit
                    WHERE   ZNG.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':naam', $request['naam'], PDO::PARAM_STR);
        $this->db->bind(':nationaliteit', $request['nationaliteit'], PDO::PARAM_STR);
        $this->db->bind(':nettowaarde', $request['nettowaarde'], PDO::PARAM_INT);
        $this->db->bind(':geboortedatum', $request['geboortedatum'], PDO::PARAM_STR);
        $this->db->bind(':bekendstehit', $request['bekendstehit'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}