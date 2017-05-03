<?php

if(!isset($_SESSION))
{
    session_start();
}
require_once("lib/smarty/Smarty.class.php");
require_once("service/CalculatriceService.php");

class CalculatriceController
{
    private $smarty;
    private $service;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->service = new CalculatriceService();
    }

    public function calcul($param){

        $result = null;

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $operation = '%';
            $valeur1 = '%';
            $valeur2 = '%';
            if (isset($param['operation'])) {
                $operation = $param['operation'];
            }
            if (isset($param['valeur1'])) {
                $valeur1 = $param['valeur1'];
            }
            if (isset($param['valeur2'])) {
                $valeur2 = $param['valeur2'];
            }

            if ($operation == 'addition'){
                $result = $this->service->add($valeur1, $valeur2);
            }
            elseif ($operation == 'soustraction') {
                $result =$this->service->sous($valeur1, $valeur2);
            }
            elseif ($operation == 'division') {
                $result = $this->service->div($valeur1, $valeur2);
            }
            elseif ($operation == 'multiplication') {
                $result = $this->service->mul($valeur1, $valeur2);
            }

        }

        $this->smarty->assign('result',$result);

        $this->smarty->display("templates/result.tpl");

        return;
    }

    public function descriptionCalculatrice(){
        $this->smarty->assign(array(
        'template' => 'templates/calculatrice.tpl',
        'session' => $this->checkConnexion()
        ));

        $this->smarty->display("templates/index.tpl");
    }
    
     private function checkConnexion(){
        if (isset($_SESSION['login'])){
            return  $_SESSION['login'];
        } else {
            return null;
        }
    }

}

?>