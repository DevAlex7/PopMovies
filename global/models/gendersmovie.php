<?php 

class Gendermovie extends Validator{
    
    private $id;
    private $movie_id;
    private $gender_id;

    public function id($value){
        if($this->validateId($value)){
            $this->id = $value;
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
    public function gender_id($value){
        if($this->validateId($value)){
            $this->gender_id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    
    public function create()
    {   
        $sql = 'INSERT INTO gendersmovie(gender, movie) VALUES (?,?)';
        $params = array($this->gender_id, $this->movie_id);
        return Database::executeRow($sql, $params);
    }
    public function getGenders_in_MoviesbyId(){
        $sql =' SELECT genders.id, genders.gender, movies.id, movies.name 
                FROM genders, movies, gendersmovie 
                WHERE genders.id=gendersmovie.gender 
                AND movies.id=gendersmovie.movie 
                AND movies.id=17';
        $params = array($this->movie_id);
        return Database::getRows($sql, $params);
    }
}

?>