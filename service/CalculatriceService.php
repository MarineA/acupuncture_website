<?php

/**
 * Classe de service pour la calculatrice
 */
class CalculatriceService{

    /**
     * Cette méthode additionne deux valeurs
     *
     * @param int $value1 Un entier
     * @param int $value2 Un entier
     *
     * @return int Resultat de l'addition
     */
    public function add($value1, $value2){
        return $value1 + $value2;
    }

    /**
     * Cette méthode soustrait deux valeurs
     *
     * @param int $value1 Un entier
     * @param int $value2 Un entier
     *
     * @return int Resultat de la soustraction
     */
    public function sous($value1, $value2){
        return $value1 - $value2;
    }

    /**
     * Cette méthode divise le premier paramètre avec le deuxième
     *
     * @param int $value1 Un entier
     * @param int $value2 Un entier
     *
     * @return int Résultat de la division
     */
    public function div($value1, $value2){
        if($value2 == 0){
            return "On ne peut pas diviser par 0";
        } else {
            return $value1 / $value2;
        }
    }

    /**
     * Cette méthode multiplie le premier paramètre avec le deuxième
     *
     * @param int $value1 Un entier
     * @param int $value2 Un entier
     *
     * @return int Résultat de la multiplication
     */
    public function mul($value1, $value2){
        return $value1 * $value2;
    }
}

?>