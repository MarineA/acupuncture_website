<?php

require_once("lib/smarty/Smarty.class.php");

class ErrorController
{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function showError404() {
        $this->smarty->display("templates/error404.tpl");
    }
}