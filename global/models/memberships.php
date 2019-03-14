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
        $sql='SELECT id, membership, price FROM memberships';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function GetMembershipbyId(){
        $sql = 'SELECT id, membership, price FROM memberships WHERE id= ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function updateMembership(){

    }
    public function deleteMembership(){

    }

}

?>