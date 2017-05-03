<?php

if(!isset($_SESSION))
{
    session_start();
}
require_once("lib/smarty/Smarty.class.php");
require_once("controller/SessionController.php");
require_once("models/manager/SessionManager.php");
require_once("controller/HomeController.php");

class SessionController
{
    
    private $manager;
    private $smarty;
    private $controller_home;
    
    public function __construct()
    {
        $this->manager = new SessionManager();
        $this->smarty = new Smarty();
        $this->controller_home = new HomeController();
    }
    
    public function inscription_form()
    {
        //Route pour le menu
        $this->smarty->assign(array(
            'template' => 'templates/inscription.tpl'
        ));
        
        $this->smarty->display("templates/index.tpl");
    }
    
    public function connexion()
    {
        if (!isset($_SESSION['login'])) {

            //Formulaire de connexion
            if (!empty($_POST)) {

                // Connexion à la database
                $login = $_POST['login'];
                $password_main = $_POST['password_main'];
                $password_main = hash("sha256", $password_main); //Hash du mot de passe
                
                $infos = array(
                    "login" => $login,
                    "password_main" => $password_main
                );
                
                
                $manager = new SessionManager();
                
                $id = $manager->connexion($infos);


                //    
                if ($id != 0) {
                    $_SESSION['login'] = $login;
                    //redirection
                    $this->controller_home->home();
                    
                } else {
                    //Si authentification impossible
                    $this->controller_home->home();
                }
                
                
            }
            
            
        } else 
        {
            echo "déja connecté".$_SESSION['login'];
        }
        
    }
    
    //**************************************************************
    public function inscription()
    {
        if (!isset($_SESSION['login'])) {
            
            //Formualire d'inscritption
            if (!empty($_POST) && strlen($_POST['name']) > 2 && strlen($_POST['firstname']) > 2 && filter_var($_POST['emailAddr'], FILTER_VALIDATE_EMAIL)) {
                
                $name = $_POST['name'];
                $firstname = $_POST['firstname'];
                $birthdate = $_POST['birthdate'];
                $emailAddr = $_POST['emailAddr'];
                $login = $_POST['login'];
                $password_main = $_POST['password_main'];
                $password_main = hash("sha256", $password_main); //Hash du mot de passe
                
                $consumer = array(
                    "name" => $name,
                    "firstname" => $firstname,
                    "birthdate" => $birthdate,
                    "emailAddr" => $emailAddr,
                    "login" => $login,
                    "password_main" => $password_main
                );
                
                $manager = new SessionManager();
                
                
                $query = $manager->inscription($consumer);
                $_SESSION['login'] = $login;

                //On fournit toutes les variables nécessaires au template
                //$this->smarty->assign(array(
                //  'template' => 'templates/pathos.tpl',
                //  'query' => $querym));
                $this->controller_home->home();
            }
            
        }
        else 
        {
            echo "déja connecté";
        }
        
    }
    
    //**************************************************************
    
    public function deconnexion()
    {
        
        session_unset('login');
        session_destroy();

        $this->controller_home->home();
    }
}


?>