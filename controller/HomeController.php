<?php

if(!isset($_SESSION))
{
    session_start();
}
require_once("lib/smarty/Smarty.class.php");
require_once("controller/PathoController.php");

class HomeController
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    /**
     * On affiche la page d'accueil du site
     */
    public function home()
    {
        // récupération des articles du flux RSS
        $donnee = null;
        if ($flux = simplexml_load_file('http://www.santepubliquefrance.fr/content/view/rss/426')) {
            $donnee = $flux->channel;
        }

        $this->smarty->assign(array(
            'template' => 'templates/presentation.tpl',
            'donnee_rss' => $donnee,
            'session' => $this->checkConnexion()
        ));

        $this->smarty->display("templates/index.tpl");
    }

    /**
     * On affiche les informations sur le site
     */
    public function getInfos()
    {
        $this->smarty->assign(array(
           'template' => 'templates/infos.tpl',
           'session' => $this->checkConnexion()
        ));

        $this->smarty->display("templates/index.tpl");
    }


    /**
     * On vérifie si un utilisateur est connecté
     *
     * @return null ou session
     */
    private function checkConnexion(){
        if (isset($_SESSION['login'])){
            return  $_SESSION['login'];
        } else {
            return null;
        }
    }
}
?>