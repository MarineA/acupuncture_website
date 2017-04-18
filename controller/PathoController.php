<?php

require("lib/smarty/Smarty.class.php");
require("models/manager/PathoManager.php");

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

    public function getPathoBySymptome() {


    }




}