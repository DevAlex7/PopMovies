<?php 
date_default_timezone_set("America/El_Salvador");
class Car extends Validator{
    private $id;
    private $date;
    private $status;
    private $client;

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
    public function status($value){
        if($this->validateId($value)){
            $this->status=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function client($value){
        if($this->validateId($value)){
            $this->client=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function existOrder(){
        $sql='  SELECT car.id, car.client
                FROM ((car INNER JOIN users ON car.client=users.id AND users.id=?) 
                INNER JOIN shopstatus ON car.status=shopstatus.id AND shopstatus.id=0)';
        $params=array($this->client);
        return Database::getRow($sql,$params);
    }
    public function createOrder(){
        $sql='INSERT INTO car (date, status, client) VALUES (?,?,?)';
        $params=array($today = date("Y-m-d"), 0 , $this->client);
        return Database::executeRow($sql,$params);
    }
    public function getTodayCart(){
        $sql='SELECT';
    }
    public function getIdOrder(){
        $sql='SELECT car.id FROM (car INNER JOIN users ON car.client=users.id AND users.id=?)';
        $params=array($this->client);
        return Database::getRow($sql,$params);
    }
}


?>