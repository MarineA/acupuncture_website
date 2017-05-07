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

    /**
     * @return array
     * retourne toutes les pathos
     */
    public function getAll()
    {
        $sql = "SELECT * FROM patho";
        return $this->exeQuery($sql);
    }


    /**
     * @param $symptomes
     * @return array
     * retourne toutes les pathos en rapport avec les symptomes
     */
    public function getPathoBySymptome($symptomes)
    {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE symptome.desc =" . "'" . $symptomes . "'";
        return $this->exeQuery($sql);
    }

    public function getPathoByMeridien($meridiens)
    {

        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer = code WHERE nom ='" . $meridiens . "'";
        return $this->exeQuery($sql);
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
        $sql = "SELECT * FROM patho WHERE type ='" . $type . "'";
        return $this->exeQuery($sql);
    }

    public function getPathoByAll($symptome, $meridien, $type)
    {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer = code JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE type = " . "'" . $type . " AND symptome.desc= ".$symptome."' AND nom ='" . $meridien . "'";
        return $this->exeQuery($sql);
    }


    public function getPathoBySymptomeAndMeridien($symptome, $meridien){
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer = code JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE symptome.desc =" . "'" . $symptome . "' AND nom ='" . $meridien ."'";
        return $this->exeQuery($sql);
    }


    public function getPathoBySymptomeType($symptome, $type) {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on  symptome.desc =" . "'" . $symptome . "'" ." WHERE type = " . "'" . $type . "'" ;
        return $this->exeQuery($sql);
    }

    public function getPathoByMeridienType($meridien, $type) {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer =" . "'" . $meridien . "'". "  WHERE type = " . "'" . $type . "'" ;
        return $this->exeQuery($sql);
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