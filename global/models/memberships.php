<?php 

class Membership extends Validator{
    private $id;
    private $namemembership;
    private $price;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function namemembership($value){
        if($this->validateAlphabetic($value,20,50)){
            $this->namemembership=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function price($value){
        if($this->validateMoney($value)){
            $this->price =$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getPrice(){
        return $this->price;
    }
    public function getMembership(){
        return $this->namemembership;
    }

    public function create()
    {
        $sql = 'INSERT INTO memberships(membership, price) VALUES(?,?)';
        $params = array($this->namemembership, $this->price);
        return Database::executeRow($sql, $params);
    }
    public function all()
    {
        $sql='SELECT id, membership, price FROM memberships';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function getbyId(){
        $sql = 'SELECT membership, price FROM memberships WHERE id= ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function find(){
        $sql = 'SELECT id, membership, price FROM memberships WHERE id= ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function update(){
        $sql = 'UPDATE memberships SET membership=?, price=? WHERE id=?';
        $params = array($this->namemembership, $this->price, $this->id);
        return Database::executeRow($sql, $params);
    }
    public function delete(){
        $sql = 'DELETE FROM memberships WHERE id = ?';
      $params = array($this->id);
      return Database::executeRow($sql, $params);
    }

}

?>