<?php
/**
 Script d'inscriptionxs
 */

require("database/ConnexionDb.php");

// Connexion à la database 
$db = new ConnexionDb;


//On créé les variables
$name =  $_POST['name'];
$password = $_POST['password_main'];
$email = $_POST['emailAddr'];
$password = hash("sha256", $password);  //Hash du mot de passe


$req = $bdd->prepare('INSERT INTO consumer(name, password) VALUES (:name, :password)');


$req->execute(array("name" => $login, "password" => $password));

session_start();
$_SESSION['name'] = $_POST['name'];
header('Location: '); //Rajouter la page d'accueil ici


//Code à vérifier, faut-il pas mettre login plutôt que name - Marine
?>