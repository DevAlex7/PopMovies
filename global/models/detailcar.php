<?php 

class detailCar extends Validator{
    private $id;
    private $id_movie;
    private $count;
    private $price;
    private $id_car;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
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
    public function price($value)
    {
        if($this->validateMoney($value)){
            $this->price=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_car($value)
    {
        if($this->validateId($value)){
            $this->id_car=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function createDetailOrder(){
        $sql='INSERT INTO detail_order (id_movie, count, price, id_car, date) VALUES (?,?,?,?,?)';
        $params=array($this->id_movie,$this->count, $this->price, $this->id_car, $today=date("Y-m-d"));
        return Database::executeRow($sql,$params);
    }
    public function existMovieinCart(){
        $sql='SELECT id_movie, id_car, count FROM detail_order WHERE id_car=? AND id_movie=?';
        $params=array($this->id_car, $this->id_movie);
        return Database::getRows($sql,$params);
    }
    public function updateCountbyId(){
        $sql='UPDATE detail_order SET count=? WHERE id_car=? AND id_movie=?';
        $params=array($this->count,$this->id_car,$this->id_movie);
        return Database::executeRow($sql,$params);
    }
    public function getCount(){
        $sql='SELECT count FROM detail_order WHERE id_car=? AND id_movie=?';
        $params=array($this->id_car, $this->id_movie);
        return Database::getRow($sql,$params);
    }
    public function getTodayList(){
        $sql='  SELECT movies.name, detail_order.count, detail_order.price, detail_order.date, detail_order.count*detail_order.price AS total 
                FROM ((detail_order 
                INNER JOIN movies 
                ON movies.id=detail_order.id_movie) 
                INNER JOIN car 
                ON car.id=detail_order.id_car 
                AND detail_order.id_car=? 
                AND detail_order.date=?)';
        $params=array($this->id_car, $today=date("Y-m-d"));
        return Database::getRows($sql,$params);
        
    }
}


?>