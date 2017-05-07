<?php

if(!isset($_SESSION))
{
    session_start();
}
require_once("lib/smarty/Smarty.class.php");

class ErrorController
{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    /**
     * On affiche l'erreur 404 gérée
     */
    public function showError404() {
        $this->smarty->display("templates/error404.tpl");
    }
}