<?php

if(!isset($_SESSION))
{
    session_start();
}
require_once("lib/smarty/Smarty.class.php");
require_once("models/manager/PathoManager.php");
require_once ("models/manager/SymptomeManager.php");
require_once ("models/manager/MeridienManager.php");


class PathoController
{
    private $smarty;
    private $manager;
    private $symptomanager;
    private $meridienmanager;
    private $meridiensNames = null;
    private $symptomeNames = null;
    private $types = null;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->manager = new PathoManager();
        $this->symptomanager = new SymptomeManager();
        $this->meridienmanager = new MeridienManager();
        $this->symptomeNames = $this->symptomanager->getNames(); //renvoie la liste de symptomes
        $this->meridiensNames = $this->meridienmanager->getNames();//renvoie la liste de méridien
        $this->types = $this->manager->getTypes();// renvoie la liste des types de patho
    }

    /**
     * fonction appelée par la route
     * on regarde si l'utilisateur a choisi symptome, méridien et/ou type
     * en fonction on appelle la fonction qui va récup la liste de patho en fonction des paramètres passés
     */
    public function getPatho(){
        $symptome = null;
        $meridien = null;
        $type = null;
        if(empty($_GET)){
            $this->getAll();
        } else if($_GET['symptome']!="--" && $_GET['meridien']!="--" && $_GET['type']!="--"){
            $symptome = $_GET['symptome'];
            $meridien = $_GET['meridien'];
            $type = $_GET['type'];
            $this->getPathoByAll($symptome, $meridien, $type);
        }
        else if($_GET['symptome']!="--" && $_GET['meridien']!="--" && $_GET['type']=="--"){
            $symptome = $_GET['symptome'];
            $meridien = $_GET['meridien'];
            $this->getPathoBySymptomeMeridien($symptome, $meridien);
        }

        else if($_GET['symptome']!="--" && $_GET['meridien']=="--" && $_GET['type']!="--"){
            $symptome = $_GET['symptome'];
            $type = $_GET['type'];
            $this->getPathoBySymptomeType($symptome, $type);
        }

        else if($_GET['symptome']=="--" && $_GET['meridien']!="--" && $_GET['type']!="--"){
            $meridien = $_GET['meridien'];
            $type = $_GET['type'];
            $this->getPathoByMeridienType($meridien, $type);
        }

        else if ($_GET['symptome']!="--" && $_GET['meridien']=="--" && $_GET['type']=="--") {
            $symptome = $_GET['symptome'];
            $this->getPathoBySymptome($symptome);
        }

        else if ($_GET['symptome']=="--" && $_GET['meridien']!="--" && $_GET['type']=="--") {
            $meridien = $_GET['meridien'];
            $this->getPathoByMeridien($meridien);
        }

        else if ($_GET['symptome']=="--" && $_GET['meridien']=="--" && $_GET['type']!="--"){
            $type = $_GET['type'];
            $this->getPathoByType($type);
        }
        else {
            $this->getAll();
        }
    }

    /**
     * retourne toutes les pathologies
     * retourne dans le formulaires les listes de symptomes, méridiens et type également
     */
    public function getAll(){
        $query = $this->manager->getAll();

        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames,
            'types' => $this->types
        ));

        $this->smarty->display('templates/index.tpl');
    }

    /**
     * On retourne la liste de pathos en fonction d'un symptome
     *
     * @param $symptome
     */
    public function getPathoBySymptome($symptome) {

        $query = $this->manager->getPathoBySymptome($symptome);

        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames,
            'types' => $this->types
        ));

        $this->smarty->display('templates/index.tpl');

    }

    /**
     * On retourne la liste de pathos en fonction d'un méridien
     *
     * @param $meridien
     */
    public function getPathoByMeridien($meridien) {

        $query = $this->manager->getPathoByMeridien($meridien);

        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames,
            'types' => $this->types
        ));

        $this->smarty->display('templates/index.tpl');

    }

    /**
     * On retourne la liste de pathos en fonction du type
     *
     * @param $type
     */
    public function getPathoByType($type) {

        $query = $this->manager->getPathoByType($type);

        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames,
            'types' => $this->types
        ));

        $this->smarty->display('templates/index.tpl');

    }

    /**
     * @param $symptome
     * @param $meridien
     * @param $type
     * retourne la liste de pathos en fonction du symptome + méridien + type pour affiner les filtres
     */

    public function getPathoByAll($symptome, $meridien, $type){

        $query = $this->manager->getPathoByAll($symptome, $meridien, $type);

        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames,
            'types' => $this->types
        ));

        $this->smarty->display('templates/index.tpl');
    }


    /**
     * @param $symptome
     * @param $meridien
     * retourne la liste de pathos en fonction
     */
    public function getPathoBySymptomeMeridien($symptome, $meridien) {

        $query = $this->manager->getPathoBySymptomeAndMeridien($symptome, $meridien);

        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames,
            'types' => $this->types
        ));

        $this->smarty->display('templates/index.tpl');
    }

    /**
     * @param $symptome
     * @param $type
     * retourne la liste de pathos en fonction
     */
    public function getPathoBySymptomeType($symptome, $type) {

        $query = $this->manager->getPathoBySymptomeType($symptome, $type);

        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames,
            'types' => $this->types
        ));

        $this->smarty->display('templates/index.tpl');

    }

    /**
     * @param $meridien
     * @param $type
     * retourne la liste de pathos en fonction
     */
    public function getPathoByMeridienType($meridien, $type){

        $query = $this->manager->getPathoByMeridienType($meridien, $type);

        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames,
            'types' => $this->types
        ));

        $this->smarty->display('templates/index.tpl');

    }

    /**
     * On vérifie si un utilisateur est connecté
     *
     * @return null ou session
     */
    private function checkConnexion(){
        if (isset($_SESSION['login'])){
            return  $_SESSION['login'];
        } else {
            return null;
        }
    }
}