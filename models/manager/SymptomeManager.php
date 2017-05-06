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

    public function getNames(){
        $sql = 'SELECT * FROM symptome';
        $listeSymptomes = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $symptome = new Symptome($row['desc']);
            array_push($listeSymptomes, $symptome);
        }
        return $listeSymptomes;
    }

    public function getSymptomeByPatho($patho) {
        $sql = 'SELECT symptome.desc FROM symptome JOIN symptPatho on symptome.idS = symptPatho.idS JOIN patho on symptPatho.idP=patho.idP WHERE patho.desc ='. '\''. $patho . '\'' ;
        $listeSymptome = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $symptome = new Symptome($row['desc']);
            array_push($listeSymptome, $symptome);
        }
        return $listeSymptome;

    }
}