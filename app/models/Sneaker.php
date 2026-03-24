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
                        ,DATE_FORMAT(SNKR.Releasedatum, "%d/%m/%Y") as Releasedatum
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

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers ( Merk
                                    ,Model
                                    ,Type
                                    ,Prijs
                                    ,Materiaal
                                    ,Gewicht
                                    ,Releasedatum
                                    )
                VALUES (:merk,
                        :model,
                        :type,
                        :prijs,
                        :materiaal,
                        :gewicht,
                        :releasedatum)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getSneakerById($id)
    {
        $sql = 'SELECT   SNKR.Id
                        ,SNKR.Merk
                        ,SNKR.Model
                        ,SNKR.Type
                        ,SNKR.Prijs
                        ,SNKR.Materiaal
                        ,SNKR.Gewicht
                        ,SNKR.Releasedatum
                FROM    Sneakers as SNKR
                WHERE   SNKR.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateSneaker($request)
    {
        $sql = 'UPDATE Sneakers as SNKR
                    SET     SNKR.Merk = :merk
                            ,SNKR.Model = :model
                            ,SNKR.Type = :type
                            ,SNKR.Prijs = :prijs
                            ,SNKR.Materiaal = :materiaal
                            ,SNKR.Gewicht = :gewicht
                            ,SNKR.Releasedatum = :releasedatum
                    WHERE   SNKR.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $request['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $request['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $request['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}