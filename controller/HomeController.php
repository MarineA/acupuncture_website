<?php

require_once("lib/smarty/Smarty.class.php");
require_once("controller/PathoController.php");


class HomeController
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function home()
    {

        $this->smarty->assign(array(
            'template' => 'templates/presentation.tpl',
        ));

        $this->smarty->display("templates/index.tpl");
    }

    public function getInfos()
    {
        $this->smarty->assign(array(
           'template' => 'templates/infos.tpl',
        ));

        $this->smarty->display("templates/index.tpl");
    }


    public function getRSS()
    {
        $donnee = null;
        if ($flux = simplexml_load_file('http://www.santepubliquefrance.fr/content/view/rss/426')) {
            $donnee = $flux->channel;
        }

        $this->smarty->assign(array(
            'template' => 'templates/articles.tpl',
            'donnee_rss' => $donnee
        ));

        $this->smarty->display("templates/index.tpl");
    }

}
?>