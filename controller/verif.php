<?
//Page de verification de connexion de l'utilisateur - a mettre en include dans la page à sécuriser

include_once("lib/smarty/Smarty.class.php");

session_start();


/*si la variable de session login n'existe pas cela siginifie que le visiteur n'a pas de session ouverte, il n'est donc pas logué ni autorisé à acceder à la recherche */

if(!isset($_SESSION['login'])) {
    
    $this->smarty->assign(array(
            'template' => 'templates/verif.tpl',
        ));

        $this->smarty->display("templates/index.tpl");
    
}

?> 