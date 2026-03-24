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
                        ,DATE_FORMAT(HRL.Releasedatum, "%d/%m/%Y") as Releasedatum
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

    public function create($data)
    {
        $sql = "INSERT INTO Horloges ( Merk
                                    ,Model
                                    ,Prijs
                                    ,Materiaal
                                    ,Diameter
                                    ,Beweging
                                    ,Releasedatum
                                    )
                VALUES (:merk,
                        :model,
                        :prijs,
                        :materiaal,
                        :diameter,
                        :beweging,
                        :releasedatum)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':diameter', $data['diameter'], PDO::PARAM_INT);
        $this->db->bind(':beweging', $data['beweging'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getHorlogeById($id)
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
                WHERE   HRL.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateHorloge($request)
    {
        $sql = 'UPDATE Horloges as HRL
                    SET     HRL.Merk = :merk
                            ,HRL.Model = :model
                            ,HRL.Prijs = :prijs
                            ,HRL.Materiaal = :materiaal
                            ,HRL.Diameter = :diameter
                            ,HRL.Beweging = :beweging
                            ,HRL.Releasedatum = :releasedatum
                    WHERE   HRL.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $request['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':diameter', $request['diameter'], PDO::PARAM_INT);
        $this->db->bind(':beweging', $request['beweging'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}