<?php
require("lib/smarty/Smarty.class.php"); // On inclut la classe Smarty
require("ConnexionDb.php");

$smarty = new Smarty();

$db = new ConnexionDb();

//menu 
//Variable de l'url
$page_var = 'page'; 

//utilisation de $_REQUEST scope 
$page_request = $_REQUEST[$page_var]; 

//Tableau faisant le lien entre le nom de la page (affiché dans l'url) et le template correspondant
$menu = array ( 
            'Presentation' => 'templates/presentation.tpl', 
            'Pathologies' => 'templates/pathos.tpl' 
            ); 

// On vérifie que la page demandée existe
if ( array_key_exists ( $page_request, $menu ) ) {
    $template = $menu[$page_request]; 
} else {
    // Si elle n'existe pas on affiche la page presentation.html par défaut
   $template = 'templates/presentation.tpl'; 
}  

//On assigne les informations
$smarty->compile_id = $template; 
$smarty->caching = 1; 
$smarty->assign('menu', $menu); 
$smarty->assign('template', $template); 
$query = "";
//On assigne la query liée au template
if($template == 'templates/pathos.tpl' ){
    $query =listPatho($smarty, $db);
}
$smarty->assign('query', $query);
$smarty->assign('page_var', $page_var); 
$smarty->display('templates/index.tpl'); 

//Fonction permettant de récupérer la liste des pathologies 
function listPatho($smarty, $db){  
    $sql = 'SELECT * FROM patho'; 
    $listePatho = $db->requete($sql);
    return $listePatho;
}
 
?>
