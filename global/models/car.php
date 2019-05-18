<?php 

class Car extends Validator{
    private $id;
    private $id_user;
    private $id_movie;
    private $count;
    private $date;
    private $status;
    private $total;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_user($value){
            if($this->validateId($value)){
                $this->id_user=$value;
                return true;
            }
            else{
                return false;
            }
    }
    public function id_movie($value){
        if($this->validateId($value)){
            $this->id_movie=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function count($value){
        if($this->validateId($value)){
            $this->count=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function total($value)
    {
        if($this->validateMoney($value)){
            $this->total=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function create(){
        $sql='INSERT INTO car(id_user,id_movie,count, date, status, total) VALUES (?,?,?,?,?,?)';
        $params = array($this->id_user,$this->id_movie, $this->count, $today=date("Y-m-d") , 0, $this->total);
        return Database::executeRow($sql,$params);
    }
    public function updateList(){
        $sql='UPDATE car SET count=?, total=? WHERE id_user=? AND id_movie=? AND date=?';
        $params=array($this->count, $this->total ,$this->id_user, $this->id_movie, date("Y-m-d"));
        return Database::executeRow($sql,$params);
    }
    public function exist(){
        $sql='SELECT id_user, id_movie, date FROM car WHERE id_user=? AND id_movie=? AND date=?';
        $params=array($this->id_user,$this->id_movie, date("Y-m-d"));
        return Database::getRow($sql,$params);
    }
    public function delete(){

    }
    public function getListbyId(){
        $sql='SELECT * FROM car WHERE id_user=? AND id_movie=? AND date=?';
        $params=array($this->id_user,$this->id_movie, date("Y-m-d"));
        return Database::getRow($sql,$params);
    }
    public function all(){

    }
}

?>