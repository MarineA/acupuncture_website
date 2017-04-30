<?php

require("lib/smarty/Smarty.class.php");
require("models/manager/PathoManager.php");
include_once ("models/manager/SymptomeManager.php");
include_once ("models/manager/MeridienManager.php");

class PathoController
{
    private $smarty;
    private $manager;
    private $symptomanager;
    private $meridienmanager;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->manager = new PathoManager();
        $this->symptomanager = new SymptomeManager();
        $this->meridienmanager = new MeridienManager();

    }

    //Fonction permettant de récupérer la liste des pathologies et les symptomes dans un select
    public function getAll(){

        $query = $this->manager->getAll();
        $query2 = $this->manager->getMeridiens();
        $query3 = $this->symptomanager->getSymptomes();

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'query' => $query,
            'query2' => $query2,
            'query3' => $query3,
            //'query4' => $query4
        ));

        $this->smarty->display('templates/index.tpl');
    }


    public function getPathoBySymptome() {
        $symptomes = $_GET['symptomes'];

        $query4 = $this->manager->getPathoBySymptome($symptomes);

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/resultats.tpl',
           // 'query3' => $query3,
            'query4' => $query4));

        $this->smarty->display('templates/index.tpl');

    }

    public function getPathoByMeridien() {
        $meridiens = $_GET['meridiens'];

        $query5 = $this->manager->getPathoByMeridien($meridiens);

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/resultatsM.tpl',
            // 'query3' => $query3,
            'query5' => $query5));

        $this->smarty->display('templates/index.tpl');

    }

}