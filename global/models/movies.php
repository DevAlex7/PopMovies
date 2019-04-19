<?php 

class Movies extends Validator{
    
    private $id;
    private $name;
    private $sipnosis;
    private $time;
    private $cover;
    private $imageroot='../../resources/dashboard/img/covers/';
    private $price;
    private $count;
    private $customer;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }else{
            return false;
        }
    }
    public function name($value){
        if($this->validateAlphanumeric($value, 1, 100)){
            $this->name=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function sipnosis($value){
        if($value==null){
            return false;
        }
        else{
            $this->sipnosis=$value;
            return true;
        }

    }
    public function time($value){
        if(!preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $value)){
            return false;
        }
        else{
            $this->time = $value;
            return true;            
        }
    }
    public function cover($file, $name){
        if($this->validateImageFile($file, $this->imageroot, $name, 500, 500)){
            $this->cover = $this->getImageName();
            return true;
        }
        else{
            return false;
        }
    }
    public function price($value){
        if($this->validateMoney($value)){
            $this->price = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function count($value){
        if($this->validateAlphanumeric($value, 1, 100)){
            $this->count = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function customer($value){
        if($this->validateId($value)){
            $this->customer=$value;
            return true;
        }else{
            return false;
        }
    }
    public function getImage(){
        return $this->cover;
    }
    public function getRoot(){
        return $this->imageroot;
    }

    public function GetMovies()
	{
        $sql = 'SELECT COUNT(*) FROM movies AS shop';
        $params = array(null);
        return Database::getRow($sql, $params);
    }
    public function findbyId(){
        $sql='SELECT * FROM movies WHERE id=?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function all(){
        $sql = 'SELECT * FROM movies';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function create(){
        $sql = 'INSERT INTO movies(name, sinopsis, time, cover, price, count, customer) VALUES (?,?,?,?,?,?,?)';
        $params= array($this->name, $this->sipnosis, $this->time, $this->cover, $this->price, $this->count, $this->customer);
        return Database::executeRow($sql , $params);
    }
}

?>