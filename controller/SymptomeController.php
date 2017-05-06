<?php

if(!isset($_SESSION))
{
    session_start();
}
require_once("lib/smarty/Smarty.class.php");
require_once("models/manager/SymptomeManager.php");
require_once("models/manager/PathoManager.php");

class SymptomeController
{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->manager = new SymptomeManager();
        $this->pathomanager = new PathoManager();
        $this->pathoNames = $this->pathomanager->getAll();
    }

    //Fonction permettant de récupérer les symptômes
    public function getSymptome(){

        $patho = null;

        if (isset($_GET['patho'])) {
            $patho = $_GET['patho'];
        }

        if ($patho != null) {
            $this->getSymptomeByPatho($patho);
        } else {
            $this->getNames();
        }
    }

    public function getSymptomeByPatho($patho) {

        //$manager = new SymptomeManager();
        $query = $this->manager->getSymptomeByPatho($patho);

        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'query' => $query,
            'pathos' => $this->pathoNames));

        $this->smarty->display('templates/index.tpl');
    }


    public function getNames(){
        $query = $this->manager->getNames();

        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'query' => $query,
            'pathos' => $this->pathoNames

        ));

        $this->smarty->display('templates/index.tpl');
    }

}