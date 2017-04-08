<?php

class CalculatriceService{

    public function add($value1, $value2){
        return $value1 + $value2;
    }

    public function sous($value1, $value2){
        return $value1 - $value2;
    }

    public function div($value1, $value2){
        if($value2 == 0){
            return "On ne peut pas diviser par 0";
        } else {
            return $value1 / $value2;
        }
    }

    public function mul($value1, $value2){
        return $value1 * $value2;
    }
}

?>