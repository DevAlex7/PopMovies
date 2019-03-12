<?php 

class Actor extends Validator{
    
    public $id;
    public $name;

    public function SaveActor()
    {
      $sql = 'INSERT INTO actors(name) VALUES(?)';
      $params = array($this->name);
      return Database::executeRow($sql, $params);
    }
    public function GetActors()
    {
      $sql = 'SELECT id, name FROM actors';
      $params = array(null);
      return Database::getRows($sql, $params);
    }
    public function ShowInformation()
    {
      $sql = 'SELECT id, name FROM actors WHERE id= ?';
      $params = array($this->id);
      return Database::getRow($sql, $params);
    }
    public function UpdateActor(){
      $sql = 'UPDATE actors SET name = ? WHERE id = ?';
      $params = array($this->name, $this->id);
      return Database::executeRow($sql, $params);
    }
    public function DeleteActor()
    {
      $sql = 'DELETE FROM actors WHERE id = ?';
      $params = array($this->id);
      return Database::executeRow($sql, $params);
    }

}

?>