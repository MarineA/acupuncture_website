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
        $this->symptomeNames = $this->symptomanager->getNames();
        $this->meridiensNames = $this->meridienmanager->getNames();
        $this->types = $this->manager->getTypes();
    }

    public function getPatho(){
        $symptome = null;
        $meridien = null;
        $type = null;

        if (isset($_GET['symptome'])) {
            $symptome = $_GET['symptome'];
        }

        if (isset($_GET['meridien'])) {
            $meridien = $_GET['meridien'];
        }

        if (isset($_GET['type'])){
            $type = $_GET['type'];
        }

        if ($symptome != null) {
            $this->getPathoBySymptome($symptome);
        } elseif ($meridien != null) {
            $this->getPathoByMeridien($meridien);
        } elseif ($type != null) {
            $this->getPathoByType($type);
        } else {
            $this->getAll();
        }

    }

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

    private function checkConnexion(){
        if (isset($_SESSION['login'])){
            return  $_SESSION['login'];
        } else {
            return null;
        }
    }
}