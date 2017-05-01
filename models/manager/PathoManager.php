<?php

require_once("models/database/ConnexionDb.php");
require_once("models/Patho.php");

class PathoManager
{

    private $db;

    public function __construct()
    {
        $this->db = new ConnexionDb;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM patho";
        $listePatho = array();
        $result = $this->db->requete($sql);

        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;
    }

    public function getPathoBySymptome($symptomes)
    {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE symptome.desc =" . "'" . $symptomes . "'";
        $listePatho = array();
        $result = $this->db->requete($sql);

        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;
    }

    public function getPathoByMeridien($meridiens)
    {

        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer = code WHERE nom =" . "'" . $meridiens . "'";
        $listePatho = array();
        $result = $this->db->requete($sql);

        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;
    }

    public function getTypes()
    {
        $sql = "SELECT type FROM patho group by type";
        $types = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            array_push($types, $row['type']);
        }
        return $types;
    }

    public function getPathoByType($type)
    {
        $sql = "SELECT * FROM patho WHERE type =" . "'" . $type . "'";
        $listePatho = array();
        $result = $this->db->requete($sql);

        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;
    }

    /**
     * @param $query
     */
    private function exeQuery($query){
        $listePatho = array();
        $result = $this->db->requete($query);

        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;
    }
}
?>