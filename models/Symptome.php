<?php

/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 16/04/2017
 * Time: 11:47
 */
class Symptome
{
    private $desc; /* Description d'un symptôme */

    public function __construct($desc) {
        $this->desc = $desc;
    }

    public function getDesc(){
        return $this->desc;
    }
}