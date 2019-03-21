<?php 

class Membership{
    public $id;
    public $membership;
    public $price;

    public function exist()
    {
        $sql = 'SELECT membership FROM memberships WHERE membership=?';
        $params = array($this->membership);
        return Database::getRow($sql, $params);
    }
    public function create()
    {
        $sql = 'INSERT INTO memberships(membership, price) VALUES(?,?)';
        $params = array($this->membership, $this->price);
        return Database::executeRow($sql, $params);
    }
    public function all()
    {
        $sql='SELECT id, membership, price FROM memberships';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function find(){
        $sql = 'SELECT id, membership, price FROM memberships WHERE id= ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function update(){
        $sql = 'UPDATE memberships SET membership=?, price=? WHERE id=?';
        $params = array($this->membership, $this->price, $this->id);
        return Database::executeRow($sql, $params);
    }
    public function delete(){
        $sql = 'DELETE FROM memberships WHERE id = ?';
      $params = array($this->id);
      return Database::executeRow($sql, $params);
    }

}

?>