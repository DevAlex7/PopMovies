<?php 

class Clasificationsmovie extends Validator{
    private $id;
    private $clasification_id;
    private $movie_id;
    

    public function id($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function clasification_id($value){
        if($this->validateId($value)){
            $this->clasification_id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function movie_id($value){
        if($this->validateId($value)){
            $this->movie_id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function exist(){
        $sql='
            SELECT movie 
            FROM clasificationsmovie
            WHERE movie=?
        ';
        $params= array($this->movie_id);
        return Database::getRow($sql,$params);
    }
    public function create(){
        $sql = 'INSERT INTO clasificationsmovie (clasification,movie) VALUES (?,?)';
        $params = array($this->clasification_id, $this->movie_id);
        return Database::executeRow($sql,$params);
    }
    public function edit(){
        $sql='
            UPDATE clasificationsmovie 
            SET clasification=? 
            WHERE id=?';
        $params=array($this->clasification_id,$this->id);
        return Database::executeRow($sql, $params); 
    }
    //Table
    public function GetClasificationsInMovies(){
        $sql='
        SELECT clasificationsmovie.id, clasifications.clasification, movies.name 
        FROM clasifications, movies, clasificationsmovie 
        WHERE clasifications.id=clasificationsmovie.clasification 
        AND movies.id=clasificationsmovie.movie
        ';
        $params=array($this->clasification_id,$this->movie_id);
        return Database::getRows($sql, $params);
    }
    //Selects
    public function getListbyId(){
        $sql='SELECT * FROM clasificationsmovie WHERE id=?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }
    public function getClasificationsinMovie(){
        $sql='  SELECT clasifications.clasification 
                FROM clasifications, movies, clasificationsmovie 
                WHERE clasifications.id=clasificationsmovie.clasification 
                AND movies.id=clasificationsmovie.movie AND movies.id=?';
        $params=array($this->movie_id);
        return Database::getRow($sql, $params);
    }
    public function getNames(){
        $sql='  SELECT clasifications.clasification, movies.name
                FROM movies, clasifications, clasificationsmovie
                WHERE clasifications.id=clasificationsmovie.clasification 
                AND movies.id=clasificationsmovie.movie AND clasifications.id=? AND movies.id=?';
        $params=array($this->clasification_id,$this->movie_id);
        return Database::getRow($sql,$params);
    }
}

?>