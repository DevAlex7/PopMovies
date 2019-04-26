<?php 

class Clasification extends Validator{
    
    private $id;
    private $nameClasification;
    private $descriptionClasification;

    public $search;

    public function search($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->search = $value;
            return true;
        }
        else{
            return false;
        }
    }

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
        
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->nameClasification=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function descriptionClasification($value){
        $this->descriptionClasification=$value;
        return true;
    }
    public function findall(){
        $sql='SELECT id, clasification, description FROM clasifications WHERE clasification LIKE ?';
        $params = array("%$this->search%");
        return Database::getRows($sql, $params);
    }
    public function all(){
        $sql='SELECT * FROM clasifications';
        $params=array(null);
        return Database::getRows($sql,$params);
    }
    public function findById(){
        $sql='SELECT * FROM clasifications WHERE id=?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }
    public function create(){
        $sql='INSERT INTO clasifications (clasification, description) VALUES (?,?)';
        $params = array($this->nameClasification, $this->descriptionClasification);
        return Database::executeRow($sql,$params);
    }
    public function edit(){
        $sql = 'UPDATE clasifications SET clasification=?, description=? WHERE id=?';
        $params = array($this->nameClasification, $this->descriptionClasification, $this->id);
        return Database::executeRow($sql, $params);
    }
    public function destroy(){
        $sql='DELETE FROM clasifications WHERE id=?';
        $params=array($this->id);
        return Database::executeRow($sql, $params);
    }
}

?>