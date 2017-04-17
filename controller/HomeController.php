<?php

require("lib/smarty/Smarty.class.php");

class HomeController
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function home()
    {

        $donnee_rss = $this->getRSS();

        $this->smarty->assign(array(
            'template' => 'templates/presentation.tpl',
            'donnee_rss' => $donnee_rss
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
        if ($flux = simplexml_load_file('http://ccj.hypotheses.org/feed')) {
            $donnee = $flux->channel;
        }
        return $donnee;

    }

}
?>