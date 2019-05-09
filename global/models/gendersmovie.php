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

    public function exist(){
        $sql='
            SELECT gender, movie
            FROM gendersmovie
            WHERE gender=? AND movie=?;
        ';
        $params=array($this->gender_id, $this->movie_id);
        return Database::getRows($sql, $params);
    }
    
    public function create()
    {   
        $sql = 'INSERT INTO gendersmovie(gender, movie) VALUES (?,?)';
        $params = array($this->gender_id, $this->movie_id);
        return Database::executeRow($sql, $params);
    }
    public function edit(){
        $sql='UPDATE gendersmovie SET gender=?, movie=? WHERE id=?';
        $params= array($this->gender_id, $this->movie_id, $this->id);
        return Database::executeRow($sql,$params);
    }
    public function destroy(){
        $sql='DELETE FROM gendersmovie WHERE id=?';
        $params=array($this->id);
        return Database::executeRow($sql, $params);
    }
    public function getList(){
        $sql='SELECT * FROM gendersmovie';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
    public function getListbyId(){
        $sql='SELECT * FROM gendersmovie WHERE id=?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }
    public function getGenders(){
        $sql='
        SELECT gendersmovie.id, genders.gender, movies.name 
        FROM genders, movies, gendersmovie 
        WHERE genders.id=gendersmovie.gender 
        AND movies.id=gendersmovie.movie';
        $params=array(null);
        return Database::getRows($sql,$params);
    }
    public function getGenders_in_MoviesbyId(){
        $sql =' SELECT genders.id, genders.gender, movies.id, movies.name 
                FROM genders, movies, gendersmovie 
                WHERE genders.id=gendersmovie.gender 
                AND movies.id=gendersmovie.movie 
                AND movies.id=?';
        $params = array($this->movie_id);
        return Database::getRows($sql, $params);
    }
    public function getNames(){
        $sql='  SELECT genders.gender AS Gender, movies.name as Movie 
                FROM genders, movies, gendersmovie
                WHERE genders.id=gendersmovie.gender 
                AND movies.id=gendersmovie.movie
                AND genders.id=? AND movies.id=?';
        $params=array($this->gender_id,$this->movie_id);
        return Database::getRow($sql,$params);
    }
}

?>