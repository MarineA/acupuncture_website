<?php

include_once("models/database/ConnexionDb.php");

class KeywordManager {

    private $db;

    public function __construct()
    {
        $this->db = new ConnexionDb;
    }

    /**
     * Cette méthode retourne la liste des noms de mots-clé
     *
     * @return array
     */
    public function getNames(){

        $sql = 'SELECT name FROM keywords';
        $names = array();
        $result = $this->db->requete($sql);
        foreach ($result as $row) {
            array_push($names, $row['name']);
        }
        return $names;
    }
}

?>