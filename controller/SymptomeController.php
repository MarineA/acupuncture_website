<?php

if(!isset($_SESSION))
{
    session_start();
}
require_once("lib/smarty/Smarty.class.php");
require_once("models/manager/SymptomeManager.php");
require_once("models/manager/PathoManager.php");
require_once("models/manager/KeywordManager.php");

class SymptomeController
{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->manager = new SymptomeManager();
        $this->pathomanager = new PathoManager();
        $this->keywordmanager = new KeywordManager();
        $this->pathoNames = $this->pathomanager->getAll();
        $this->keywordNames = $this->keywordmanager->getNames();
    }

    //Fonction permettant de récupérer les symptômes en fonction des filtres
    public function getSymptome(){

        $patho = null;
        $keyword = null;

        if ($_GET['patho']!="") {
            $patho = $_GET['patho'];
            $this->getSymptomeByPatho($patho);
        }
        else if ($_GET['keyword']!="") {
            $keyword = $_GET['keyword'];
            $this->getSymptomeByKeywords($keyword);
        } else {
            $this->getAll();
        }
    }

    /**
     * On récupère tous les noms des symptomes + les listes des pathos
     */
    public function getAll() {

        $query = $this->manager->getNames();
        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'pathos' => $this->pathoNames,
            'keywords' => $this->keywordNames
        ));

        $this->smarty->display('templates/index.tpl');

    }

    /**
     * @param $patho
     * on récupère les symptomes en fonction d'une patho sélectionnée
     */
    public function getSymptomeByPatho($patho) {

        //$manager = new SymptomeManager();
        $query = $this->manager->getSymptomeByPatho($patho);

        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'pathos' => $this->pathoNames,
            'keywords' => $this->keywordNames
        ));

        $this->smarty->display('templates/index.tpl');
    }

    /**
     * on récupère la liste des noms de patho
     */
    public function getNames(){
        $query = $this->manager->getNames();

        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'query' => $query,
            'pathos' => $this->pathoNames

        ));

        $this->smarty->display('templates/index.tpl');
    }

    /**
     * @param $keyword
     * on récupère les symptomes associés à un mot clé
     */
    public function getSymptomeByKeywords($keyword) {

        $query = $this->manager->getSymptomeByKeywords($keyword);


        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'session' => $this->checkConnexion(),
            'query' => $query,
            'pathos' => $this->pathoNames,
            'keywords' => $this->keywordNames
        ));

        $this->smarty->display('templates/index.tpl');
    }

    private function checkConnexion(){
        if (isset($_SESSION['login'])){
            return  $_SESSION['login'];
        } else {
            return null;
        }
    }
}