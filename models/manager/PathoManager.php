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
}

?>