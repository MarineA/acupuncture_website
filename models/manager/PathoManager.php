<?php

include_once("models/database/ConnexionDb.php");
include_once("models/Patho.php");

class PathoManager {

    private $db;

    public function __construct()
    {
        $this->db = new ConnexionDb;
    }

    public function getAll(){
        $sql = 'SELECT * FROM patho';
        $listePatho = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;
    }

    public function getPathoBySymptome($symptomes){
        $sql = 'SELECT mer, type, patho.desc FROM patho JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE symptome.desc =' . '\'' .$symptomes . '\'';
        $listePatho = array();
        $result = $this->db->requete($sql);

            foreach ($result as $row) {
                $patho = new Patho($row['mer'], $row['type'], $row['desc']);
                array_push($listePatho, $patho);
            }

        return $listePatho;

    }

    public function getPathoByMeridien($meridiens) {

        $sql = 'SELECT mer, type, patho.desc FROM patho WHERE mer =' . '\'' .$meridiens . '\'';
        $listePatho = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;

    }

    public function getPathoByType() {
        $sql = 'SELECT * FROM patho WHERE  ';
        $listePatho = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;

    }

    public function getMeridiens() {
        $sql = 'SELECT mer FROM patho ';
        $listeMeridiens = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $mer = $row['mer'];
            array_push($listeMeridiens, $mer);
        }
        return $listeMeridiens;
    }




}

?>