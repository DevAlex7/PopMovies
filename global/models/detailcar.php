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
    public function allbyId(){
        $sql = 'SELECT * FROM detail_order WHERE id=?';
        $params=array($this->id);
        return Database::getRow($sql,$params);
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
    public function getListOrder(){
        $sql =' SELECT detail_order.id, movies.id AS movieId, movies.name, detail_order.count, detail_order.price, detail_order.date, shopstatus.status 
                FROM ((detail_order 
                INNER JOIN car ON car.id=detail_order.id_car AND car.id=?) 
                INNER JOIN movies ON movies.id=detail_order.id_movie 
                INNER JOIN shopstatus ON car.status=shopstatus.id AND car.status=0)';
        $params=array($this->id_car);
        return Database::getRows($sql,$params);
    }
    public function getListOrderBought(){
        $sql =' SELECT detail_order.id, movies.id AS movieId, movies.name, detail_order.count, detail_order.price, detail_order.date, shopstatus.status 
                FROM ((detail_order 
                INNER JOIN car ON car.id=detail_order.id_car AND car.id=?) 
                INNER JOIN movies ON movies.id=detail_order.id_movie 
                INNER JOIN shopstatus ON car.status=shopstatus.id AND car.status=1)';
        $params=array($this->id_car);
        return Database::getRows($sql,$params);
    }
    public function getTotalCar(){
        $sql='SELECT SUM(detail_order.count * detail_order.price) AS resultado, shopstatus.status FROM ((detail_order INNER JOIN car ON car.id=detail_order.id_car AND car.id=19) INNER JOIN movies ON movies.id=detail_order.id_movie INNER JOIN shopstatus ON car.status=shopstatus.id AND car.status=1)';
        $params = array($this->id_car);
        return Database::getRow($sql,$params);
    }
    public function deleteItemList(){
        $sql='DELETE FROM detail_order WHERE id=?';
        $params=array($this->id);
        return Database::executeRow($sql,$params);
    }

    public function getMostSails(){
        $sql='  SELECT SUM(detail_order.count) AS cantidad ,movies.name 
                FROM ((movies 
                INNER JOIN detail_order ON movies.id=detail_order.id_movie) 
                INNER JOIN car ON detail_order.id_car=car.id 
                INNER JOIN shopstatus ON car.status=shopstatus.id AND car.status=1) GROUP BY movies.name';
        $params=array(null);
        return Database::getRows($sql,$params);
    }
    public function getCountSailinDates(){
        $sql='SELECT SUM(detail_order.count) AS ventas, detail_order.date FROM (
            (detail_order INNER JOIN car ON car.id=detail_order.id_car) 
            INNER JOIN shopstatus ON shopstatus.id=car.status AND car.status=1)  GROUP BY detail_order.date ';
        $params=array(null);
        return Database::getRows($sql,$params);
    }
    public function reportSails(){
        $sql='SELECT movies.name ,detail_order.date, CONCAT(users.uname, " " ,users.lastname) AS fullname FROM (
            (detail_order INNER JOIN car ON car.id=detail_order.id_car) 
            INNER JOIN shopstatus ON shopstatus.id=car.status AND car.status=1 INNER JOIN movies ON detail_order.id_movie=movies.id INNER JOIN users ON car.client=users.id)';
        $params = array(null);
        return Database::getRows($sql,$params);
    }
}


?>