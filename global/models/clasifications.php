<?php 

class Clasification extends Validator{
    
    private $id;
    private $nameClasifition;
    private $descriptionClasification;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function nameClasification($value){
        if($this->validateAlphabetic($value)){
            $this->nameClasification=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function descriptionClasification($value){
        if($this->validateAlphabetic($value)){
            $this->descriptionClasification=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function create(){
        $sql='INSERT INTO clasifications (clasification, description) VALUES (?,?)';
        $params = array($this->nameClasification, $this->descriptionClasification);
        return Database::executeRow($sql,$params);
    }
}

?>