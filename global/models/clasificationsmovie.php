<?php 

class Clasificationsmovie extends Validator{
    private $id;
    private $clasification_id;
    private $movie_id;
    

    public function id($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function clasification_id($value){
        if($this->validateId($value)){
            $this->clasification_id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function movie_id($value){
        if($this->validateId($value)){
            $this->movie_id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function create(){
        $sql = 'INSERT INTO clasificationsmovie (clasification,movie) VALUES (?,?)';
        $params = array($this->clasification_id, $this->movie_id);
        return Database::executeRow($sql,$params);
    }
}

?>