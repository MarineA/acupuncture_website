<?php

include_once("models/database/ConnexionDb.php");
include_once("models/Symptome.php");
include_once("models/Patho.php");

/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 16/04/2017
 * Time: 17:26
 */
class SymptomeManager
{
    private $db;

    public function __construct()
    {
        $this->db = new ConnexionDb;
    }

    public function getSymptomes(){
        $sql = 'SELECT * FROM symptome';
        $listeSymptomes = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $symptome = new Symptome($row['desc']);
            array_push($listeSymptomes, $symptome);
        }
        return $listeSymptomes;
    }

    public function getPathoBySymptome($symptomes) {
        $sql = 'SELECT * FROM patho JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE symptome.desc ='. $symptomes ;
        $listePatho = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;

    }
}