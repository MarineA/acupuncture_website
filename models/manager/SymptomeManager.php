<?php

include_once("models/database/ConnexionDb.php");
include_once("models/Symptome.php");

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
}