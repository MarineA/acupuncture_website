<?php

require("lib/smarty/Smarty.class.php");
require("models/manager/PathoManager.php");
include_once ("models/manager/SymptomeManager.php");

class PathoController
{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();

    }

    //Fonction permettant de récupérer la liste des pathologies 
    public function getAll(){

        $manager = new PathoManager();

        $query = $manager->getAll();

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'query' => $query));

        $this->smarty->display('templates/index.tpl');
    }

    public function getSymptomes(){
        $manager = new SymptomeManager();

        $query2 = $manager->getSymptomes();

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'query' => $query2));

        $this->smarty->display('templates/index.tpl');
    }

    public function getPathoBySymptome() {
        $symptomes = $_GET['symptomes'];

        $manager = new PathoManager();
        $symptomanager = new SymptomeManager();

        $query3 = $symptomanager->getSymptomes();
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'query' => $query3));

        $this->smarty->display('templates/index.tpl');

        $query4 = $manager->getPathoBySymptome($symptomes);

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'query' => $query4));

        $this->smarty->display('templates/index.tpl');

    }




}