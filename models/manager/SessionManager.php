<?php

include_once("models/database/ConnexionDb.php");


class SessionManager {

    private $db;

    public function __construct()
    {
        $this->db = new ConnexionDb;
       
    }
    
    public function connexion($infos){
        
        
    // Connexion à la database          
       
    //$sql = $this->db->getDb()->prepare('SELECT id FROM consumer where emailAddr = :emailAddr AND password_main = :password_main');
    $sql = 'SELECT id FROM consumer where login = :login AND emailAddr = :emailAddr AND password_main = :password_main';
    $req = $this->db->prepare($sql);


    $req->execute($infos);
    $id = $req->rowCount($sql);
        
    return $id;

    

    }
    public function inscription($consumer){
        
       
        $sql = 'INSERT INTO consumer VALUES ("",:name, :firstname, :birthdate, :emailAddr, :login, :password_main)';
        
        $req = $this->db->prepare($sql);
        
        //$req = $this->db->getDb()->prepare('INSERT INTO consumer VALUES (:name, :firstname, :birthdate, :emailAddr, :password_main)');

        $req->execute($consumer);

                    
    }
}

?>