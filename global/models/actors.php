<?php 

class Actor extends Validator{
    
    public $id;
    public $name;
    private $search;

    
    public function id($value){
      if($this->validateId($value)){
          $this->id=$value;
          return true;
      }
      else
      {
        return false;
      }
    }
    public function searchbyInput($value){
      if($this->validateAlphanumeric($value, 1, 50)){
        $this->search = $value;
        return true;
      }
      else{
        return false;
      }
    }
    public function getname(){
      return $this->name;
    }

    public function exists(){
      $sql = 'SELECT name FROM actors WHERE name=?';
      $params = array($this->name);
      return Database::getRow($sql, $params);
    }

    public function create()
    {
      $sql = 'INSERT INTO actors(name) VALUES(?)';
      $params = array($this->name);
      return Database::executeRow($sql, $params);
    }
    public function all()
    {
      $sql = 'SELECT id, name FROM actors';
      $params = array(null);
      return Database::getRows($sql, $params);
    }
    public function find()
    {
      $sql = 'SELECT * FROM actors WHERE id= ?';
      $params = array($this->id);
      return Database::getRow($sql, $params);
    }
    public function update(){
      $sql = 'UPDATE actors SET name = ? WHERE id = ?';
      $params = array($this->name, $this->id);
      return Database::executeRow($sql, $params);
    }
    public function delete()
    {
      $sql = 'DELETE FROM actors WHERE id = ?';
      $params = array($this->id);
      return Database::executeRow($sql, $params);
    }
    public function search(){
      $sql='SELECT * FROM actors WHERE actors.name LIKE ?';
      $params= array("%$this->search%");
      return Database::getRows($sql,$params);
    }

}

?>