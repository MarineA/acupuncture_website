<?php

include_once("lib/smarty/Smarty.class.php");

class HomeController
{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function home() {

        $this->smarty->assign(array(
            'template' => 'templates/presentation.tpl',
        ));

        $this->smarty->display("templates/index.tpl");
    }

}

?>