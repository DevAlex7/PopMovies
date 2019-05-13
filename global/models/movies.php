<?php 

class Movies extends Validator{
    
    private $id;
    private $name;
    private $sipnosis;
    private $time;
    private $cover;
    private $imageroot='../../../resources/dashboard/img/covers/';
    private $price;
    private $count;
    private $year;
    private $trailer;
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
    public function year($value){
       
            if($value>0 && $value>1000 && $value<2020){
                $this->year = $value;
                return true;
            }
            else{
                return false;
            }        
      
    }
    public function trailer($value){
        if($value != strip_tags($value)){
            $this->trailer=$value;
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
        $sql='SELECT movies.id, movies.name, movies.sinopsis, movies.time, 
                     movies.cover, movies.year, movies.trailer, 
                     movies.price, movies.count, 
                     customers.id AS IdCustomer,
                     customers.enterprise AS EnterpriseCustomer
                     FROM customers, movies 
                     WHERE customers.id=movies.customer AND movies.id=?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function all(){
        $sql = 'SELECT * FROM movies';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function create(){
        $sql = 'INSERT INTO movies(name, sinopsis, time, cover, price, count, year, trailer, customer) VALUES (?,?,?,?,?,?,?,?,?)';
        $params= array($this->name, $this->sipnosis, $this->time, $this->cover, $this->price, $this->count, $this->year, $this->trailer, $this->customer);
        return Database::executeRow($sql , $params);
    }
    public function edit(){
        $sql = 'UPDATE movies SET name =?, sinopsis=?, time=?, cover=?, price=?, count=?, year=?, trailer=?, customer=? WHERE id=?';
        $params= array($this->name, $this->sipnosis, $this->time, $this->cover, $this->price, $this->count, $this->year, $this->trailer, $this->customer, $this->id);
        return Database::executeRow($sql , $params);

    }
    public function destroy(){
        $sql = 'DELETE FROM movies WHERE id=?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
    public function getMoviesbyGender(){
        $sql='  SELECT 
                genders.id, 
                genders.gender,
                movies.id, 
                movies.name,
                movies.sinopsis,
                movies.cover 
                FROM movies, genders, gendersmovie 
                WHERE genders.id=gendersmovie.gender 
                AND movies.id=gendersmovie.movie 
';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
    public function FavoriteMovies(){
        
    }
    public function existsite(){
        $sql='SELECT * FROM movies WHERE id=? AND name=?';
        $params=array($this->id,$this->name);
        return Database::getRow($sql,$params);
    }
}

?>