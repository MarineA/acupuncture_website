<?php

/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 06/05/2017
 * Time: 19:27
 */

class Keyword
{
    private $name; /* Description d'un symptôme */

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}