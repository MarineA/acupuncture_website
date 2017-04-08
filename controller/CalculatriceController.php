<?php

require("lib/smarty/Smarty.class.php");
require("service/CalculatriceService.php");

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

}

?>