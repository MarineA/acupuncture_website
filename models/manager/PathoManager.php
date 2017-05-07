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
     * Cette méthode retourne toutes les pathos
     *
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT * FROM patho";
        return $this->exeQuery($sql);
    }


    /**
     * Cette méthode retourne toutes les pathos en fonction d'un symptome
     *
     * @param $symptomes
     *
     * @return array
     */
    public function getPathoBySymptome($symptomes)
    {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE symptome.desc =" . "'" . $symptomes . "'";
        return $this->exeQuery($sql);
    }

    /**
     * Cette méthode retourne toutes les pathos en fonction d'un méridien
     *
     * @param $meridiens
     *
     * @return array
     */
    public function getPathoByMeridien($meridiens)
    {

        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer = code WHERE nom ='" . $meridiens . "'";
        return $this->exeQuery($sql);
    }

    /**
     * Cette méthode retourne tous les types de pathos
     *
     * @return array
     */
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

    /**
     * Cette méthode retourne toutes les pathos en fonction du type
     *
     * @param $type
     *
     * @return array
     */
    public function getPathoByType($type)
    {
        $sql = "SELECT * FROM patho WHERE type ='" . $type . "'";
        return $this->exeQuery($sql);
    }

    /**
     * Cette méthode retourne toutes les pathos en fonction du type, d'un méridien et d'un symptome
     *
     * @param $type
     * @param $meridien
     * @param $symptome
     *
     * @return array
     */
    public function getPathoByAll($symptome, $meridien, $type)
    {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer = code JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE type = " . "'" . $type . " AND symptome.desc= ".$symptome."' AND nom ='" . $meridien . "'";
        return $this->exeQuery($sql);
    }


    /**
     * Cette méthode retourne toutes les pathos en fonction d'un méridien et d'un symptome
     *
     * @param $symptome
     * @param $meridien
     *
     * @return array
     */
    public function getPathoBySymptomeAndMeridien($symptome, $meridien){
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer = code JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on symptPatho.idS = symptome.idS WHERE symptome.desc =" . "'" . $symptome . "' AND nom ='" . $meridien ."'";
        return $this->exeQuery($sql);
    }


    /**
     * Cette méthode retourne toutes les pathos en fonction du type et d'un symptome
     *
     * @param $symptome
     * @param $type
     *
     * @return array
     */
    public function getPathoBySymptomeType($symptome, $type) {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN symptPatho on patho.idP=symptPatho.idP JOIN symptome on  symptome.desc =" . "'" . $symptome . "'" ." WHERE type = " . "'" . $type . "'" ;
        return $this->exeQuery($sql);
    }


    /**
     * Cette méthode retourne toutes les pathos en fonction du type et d'un méridien
     *
     * @param $meridien
     * @param $type
     *
     * @return array
     */
    public function getPathoByMeridienType($meridien, $type) {
        $sql = "SELECT mer, type, patho.desc FROM patho JOIN meridien ON mer =" . "'" . $meridien . "'". "  WHERE type = " . "'" . $type . "'" ;
        return $this->exeQuery($sql);
    }

    /**
     * Cette méthode privée permet d'executer la requête
     *
     * @param $query
     *
     * @return array
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