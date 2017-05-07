<?php

include_once("models/database/ConnexionDb.php");
include_once("models/Symptome.php");
include_once("models/Keyword.php");
include_once("models/Patho.php");

class SymptomeManager
{
    private $db;

    public function __construct()
    {
        $this->db = new ConnexionDb;
    }

    /**
     * @return array
     * retourne tous les symptomes
     */
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

    /**
     * @param $patho
     * @return array
     * retourne les symptomes en fonction des pathos
     */

    public function getSymptomeByPatho($patho) {
        $sql = "SELECT symptome.desc FROM symptome JOIN symptPatho on symptome.idS = symptPatho.idS JOIN patho on symptPatho.idP=patho.idP WHERE patho.desc ='". $patho . "'xs" ;
        $listeSymptome = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $symptome = new Symptome($row['desc']);
            array_push($listeSymptome, $symptome);
        }
        return $listeSymptome;

    }

    /**
     * @param $keyword
     * @return array
     */
    public function getSymptomeByKeywords($keyword) {
        $sql = "SELECT symptome.desc FROM symptome JOIN keySympt on symptome.idS = keySympt.idS JOIN keywords on keySympt.idK=keywords.idP WHERE keywords.name LIKE '%". $keyword ."%'";
        $listeSymptome = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $symptome = new Symptome($row['desc']);
            array_push($listeSymptome, $symptome);
        }
        return $listeSymptome;

    }
}