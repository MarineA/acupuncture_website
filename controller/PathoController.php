<?php

require("lib/smarty/Smarty.class.php");
require("models/manager/PathoManager.php");
require("models/manager/MeridienManager.php");

class PathoController
{
    private $smarty;

    private $pathoManager;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->pathoManager = new PathoManager();
        $this->meridienManager = new MeridienManager();
    }


    //Fonction permettant de récupérer la liste des pathologies 
    public function getAll(){

        $query = $this->pathoManager->getAll();
        $meridiens = $this->meridienManager->getNames();

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/pathos.tpl',
            'meridiens' => $meridiens,
            'query' => $query));

        $this->smarty->display('templates/index.tpl');
    }




}