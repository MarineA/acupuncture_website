<?php
class ConnexionDb{

    private $dbName = "acupuncteurs";/*mettre le nom de votre base de donnée*/
    private $pass = "root"; /*donnez le mot de passe de votre bd */
    private $user = "root"; /*donnez le nom d’utilisateur de la bd (probablement root)*/
    private $db;
    
    public function __construc(){
        

    }
    
    public function getDb(){
 
      return new PDO('mysql:host=localhost;dbname='.$this->dbName, $this->user, $this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
    }
    

    public function requete($sql){
        $resu =null;
        
        $db = $this->getDB();

        $res= $db->query($sql);

        foreach ($res as $row) {
            $resu[] = $row;
        }
        
        return $resu;
    }
    
    public function prepare($sql){
        $db = $this->getDB();
        
        return $db->prepare($sql);
        
    
    }
    
}
?>
