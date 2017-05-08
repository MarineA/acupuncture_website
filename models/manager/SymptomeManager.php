<?php

include_once("models/database/ConnexionDb.php");
include_once("models/Symptome.php");
include_once("models/Keyword.php");
include_once("models/Patho.php");

class SymptomeManager
{
    private $db;

    /**
     * Cette méthode est le constructeur
     *
     */
    public function __construct()
    {
        $this->db = new ConnexionDb;
    }

    /**
     * Cette méthode retourne tous les symptomes
     *
     * @return array
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
     * Cette méthode retourne les symptomes en fonction des pathos
     *
     * @param $patho
     *
     * @return array
     */
    public function getSymptomeByPatho($patho) {
        $sql = "SELECT symptome.desc FROM symptome JOIN symptPatho on symptome.idS = symptPatho.idS JOIN patho on symptPatho.idP=patho.idP WHERE patho.desc ='". $patho . "'" ;
        $listeSymptome = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $symptome = new Symptome($row['desc']);
            array_push($listeSymptome, $symptome);
        }
        return $listeSymptome;

    }

    /**
     * Cette méthode retourne les symptomes en fonction des pathos et d'un mot clé
     *
     * @param $patho
     * @param $keyword
     *
     * @return array
     */
    public function getSymptomeByPathoAndKeyword($patho, $keyword) {
        $sql = "SELECT symptome.desc FROM symptome JOIN symptPatho on symptome.idS = symptPatho.idS JOIN patho on symptPatho.idP=patho.idP JOIN keySympt on symptome.idS = keySympt.idS JOIN keywords on keySympt.idK=keywords.idK WHERE patho.desc ='". $patho . "' AND name LIKE '%". $keyword ."%'";
        $listeSymptome = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $symptome = new Symptome($row['desc']);
            array_push($listeSymptome, $symptome);
        }
        return $listeSymptome;

    }

    /**
     *  Cette méthode retourne les symptomes en fonction des mots clés
     *
     * @param $keyword
     *
     * @return array
     */
    public function getSymptomeByKeywords($keyword) {
        $sql = "SELECT symptome.desc FROM symptome JOIN keySympt on symptome.idS = keySympt.idS JOIN keywords on keySympt.idK=keywords.idK WHERE name LIKE '%". $keyword ."%'";
        $listeSymptome = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            $symptome = new Symptome($row['desc']);
            array_push($listeSymptome, $symptome);
        }
        return $listeSymptome;

    }
}