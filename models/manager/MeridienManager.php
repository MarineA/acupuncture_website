<?php

include_once("models/database/ConnexionDb.php");

class MeridienManager {

    private $db;

    public function __construct()
    {
        $this->db = new ConnexionDb;
    }

    //Retourne les noms de méridiens
    public function getNames(){

        $sql = 'SELECT nom FROM meridien';
        $names = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            array_push($names, $row['nom']);
        }
        return $names;
    }
}

?>