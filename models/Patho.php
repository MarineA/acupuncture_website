<?php
class Patho{

    private $mer;/* Code du méridien d'une pathologie*/
    private $type; /* Type d'une pathologie */
    private $desc; /* Description d'une pathologie */
    
    public function __construct($mer, $type, $desc) {
        $this->mer = $mer;
        $this->type = $type;
        $this->desc = $desc;
    }
    
    public function getMer(){
        return $this->mer;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getDesc(){
        return $this->desc;
    }
}
?>