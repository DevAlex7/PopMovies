<?php 

class Memberships{
    public $id;
    public $membership;
    public $price;

    public function SaveMembership()
    {
        $sql = 'INSERT INTO memberships(membership, price) VALUES(?,?)';
        $params = array($this->membership, $this->price);
        return Database::executeRow($sql, $params);
    }
    public function ShowMemberships()
    {
        $sql='SELECT membership, price FROM memberships';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function updateMembership(){

    }
    public function deleteMembership(){

    }

}

?>