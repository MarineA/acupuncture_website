<?php    

class PathoController
{
    //Fonction permettant de récupérer la liste des pathologies 
    public function getAll($smarty, $db){
        $sql = 'SELECT * FROM patho'; 
        $listePatho = array();
        $result = $db->requete($sql);
        foreach ($result as $row) {
            $patho = new Patho($row['mer'], $row['type'], $row['desc']);
            array_push($listePatho, $patho);
        }
        return $listePatho;
    }
}