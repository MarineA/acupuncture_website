<?php

session_start();
include_once("lib/smarty/Smarty.class.php");
include_once("models/manager/SessionManager.php");
include_once("controller/PathoController.php");

class SessionController {
    
    private $manager;
    private $smarty;
    private $controller_pathos;
    
        public function __construct()
        {
            $this->manager = new SessionManager;
            $this->smarty = new Smarty;
            $this->controller_pathos = new PathoController;
        }

    public function connexion_form(){
         
        //route pour le menu
        $this->smarty->assign(array(
            'template' => 'templates/connexion.tpl',
        ));

        $this->smarty->display("templates/index.tpl");
    }
    
    public function inscription_form(){
        //Route pour le menu
         $this->smarty->assign(array(
            'template' => 'templates/inscription.tpl',
        ));

        $this->smarty->display("templates/index.tpl");
    }
    
    public function connexion() {
       
       
    //Formulaire de connexion 
    if(!empty($_POST)){
        
        // Connexion à la database 
        
        $emailAddr = $_POST['emailAddr'];
        $password_main = $_POST['password_main'];
        
        $infos = array(
            "emailAddr" => $emailAddr,
            "password_main" => $password_main 
            );
        
                    
        $manager = new SessionManager();
       
        $id = $manager->connexion($infos);
    
        
     //    
        if($id != 0 ) {

            $_SESSION['AuthAdmin'] = array( 'emailAddr' => $emailAddr, 'password_main' => $password_main);

            //$_SESSION['emailAddr'] = $_POST['emailAddr'];
            
            
            //redirection
            $this->smarty->assign(array(
                'template' => 'templates/pathos.tpl'
            ));

            $this->smarty->display("templates/index.tpl");

        } else {
            //Si l'utilisateur inconnu
            $error_unknown ='Utilisateur inexistant !';
        }
        
        
        }


     }
    
       

//**************************************************************
    public function inscription(){
        
        
        
        //Formualire d'inscritption
        if (!empty($_POST) && strlen($_POST['name'])>2 && strlen($_POST['firstname'])>2 && filter_var($_POST['emailAddr'], FILTER_VALIDATE_EMAIL)) {
            
        $name =  $_POST['name'];
        $firstname = $_POST['firstname'];
        $birthdate = $_POST['birthdate'];
        $emailAddr = $_POST['emailAddr'];
        $login = $_POST['login'];
        $password_main = $_POST['password_main'];
        $password_main = hash("sha256", $password_main);  //Hash du mot de passe

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
              $_SESSION['name'] = $_POST['name'];
        
        header('Location: TLI/projet/pathologies');
      // $this->controller_pathos->getAll();

      
        
        }
        
     }
       

       
//**************************************************************
       
    public function deconnexion(){
        
        session_start();
        session_unset();
        session_destroy();
        
        //Remplace le header        
        $this->smarty->assign(array(
            'template' => 'templates/presentation.tpl'
        ));

        $this->smarty->display("templates/index.tpl");
    
    }
}


?>