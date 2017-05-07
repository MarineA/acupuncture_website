<?php

include_once("models/database/ConnexionDb.php");


class SessionManager {

    private $db;

    /**
     * Cette méthode est le constructeur pour la class SessionManager
     * 
     */
    public function __construct()
    {
        $this->db = new ConnexionDb;
       
    }
    
    /**
     * Cette méthode permet de se connecter
     *
     * @param array $infos tableau des informations de l'utilisateurs(login et mot de passe)
     *
     * @return int id l'id de l'utilisateur
     */
    public function connexion($infos){
        
    $sql = 'SELECT id FROM consumer where login = :login AND password_main = :password_main';
    $req = $this->db->prepare($sql);


    $req->execute($infos);
    $id = $req->rowCount($sql);
        
    return $id;    

    }
    
    
    /**
     * Cette méthode permet de s'inscrire
     *
     * @param array $consumer tableau des informations de l'utilisateurs
     *
     * 
     */
    public function inscription($consumer){
        
       
        
        $sql = 'INSERT INTO consumer VALUES ("",:name, :firstname, :birthdate, :emailAddr, :login, :password_main)';
        
        $req = $this->db->prepare($sql);
        
        //$req = $this->db->getDb()->prepare('INSERT INTO consumer VALUES (:name, :firstname, :birthdate, :emailAddr, :password_main)');

        $req->execute($consumer);

                    
    }
}

?>