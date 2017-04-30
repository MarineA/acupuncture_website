<?php

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
    private $meridiensNames;
    private $symptomeNames;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->manager = new PathoManager();
        $this->symptomanager = new SymptomeManager();
        $this->meridienmanager = new MeridienManager();
        $this->symptomeNames = $this->symptomanager->getNames();
        $this->meridiensNames = $this->meridienmanager->getNames();
    }

    public function getPatho(){
        $symptomes = $_GET['symptomes'];

        $meridiens = $_GET['meridiens'];

        if ($symptomes == null && $meridiens == null){
            $this->getAll();
        } elseif ($symptomes != null) {
            $this->getPathoBySymptome($symptomes);
        } elseif ($meridiens != null) {
            $this->getPathoByMeridien($meridiens);
        }

    }

    //Fonction permettant de récupérer la liste des pathologies et les symptomes dans un select
    public function getAll(){
        $query = $this->manager->getAll();

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames
        ));

        $this->smarty->display('templates/index.tpl');
    }

    public function getPathoBySymptome($symptomes) {

        $query = $this->manager->getPathoBySymptome($symptomes);

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames
        ));

        $this->smarty->display('templates/index.tpl');

    }

    public function getPathoByMeridien($meridiens) {

        $query = $this->manager->getPathoByMeridien($meridiens);

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'query' => $query,
            'symptomes' => $this->symptomeNames,
            'meridiens' => $this->meridiensNames
        ));

        $this->smarty->display('templates/index.tpl');

    }
}