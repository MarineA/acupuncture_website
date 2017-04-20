<?php

require("lib/smarty/Smarty.class.php");
require("models/manager/SymptomeManager.php");

/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 16/04/2017
 * Time: 11:43
 */
class SymptomeController
{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    //Fonction permettant de récupérer les symptômes
    public function getSymptome(){

        $manager = new SymptomeManager();

        $query = $manager->getSymptomes();

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'query' => $query));

        $this->smarty->display('templates/index.tpl');
    }

/*    public function getSymptomeByPatho() {

        $manager = new SymptomeManager();
        $query = $manager->getSymptomes();

        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'query' => $query));

        $this->smarty->display('templates/index.tpl');
    }
*/
    public function getPathoBySymptome() {
        $symptomes = $_GET['symptomes'];
        $manager = new SymptomeManager();

        $query = $manager->getPathoBySymptome($symptomes);

        //On fournit toutes les variables nécessaires au template
        $this->smarty->assign(array(
            'template' => 'templates/symptome.tpl',
            'query' => $query));

        $this->smarty->display('templates/index.tpl');

    }
}