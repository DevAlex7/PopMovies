<?php 

class Actormovie extends Validator{
   
    private $id;
    private $id_actor;
    private $id_movie;

    public function id($value){
        if($this->validateId($value)){
            $this->id =$value;
            return true;
        }
        else{
            return false;
        }
    }

    public function id_actor($value){
        if($this->validateId($value)){
            $this->id_actor=$value;
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

    public function save(){
        $sql = 'INSERT INTO actorsmovie(Actor, Movie) VALUES(?,?)';
        $params = array($this->id_actor,$this->id_movie);
        return Database::executeRow($sql, $params);
    }
    public function getListbyId(){
        $sql='SELECT * FROM actorsmovie WHERE id=?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function getActors_in_Movies(){
        $sql='  SELECT 
                actors.id AS IdActor, actors.name AS Actorname, 
                movies.id AS IdMovie, movies.name AS Moviename
                FROM actors, movies, actorsmovie 
                WHERE actors.id=actorsmovie.Actor 
                  AND movies.id=actorsmovie.Movie';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
    public function getActors_in_MoviesbyId(){
        $sql='  SELECT 
                actors.id AS id_actor, 
                actors.name AS actorname, 
                movies.id AS id_movie, 
                movies.name AS moviename 
                FROM actors, movies, actorsmovie 
                WHERE actors.id=actorsmovie.Actor 
                AND movies.id=actorsmovie.Movie 
                AND movies.id=?';
        $params=array($this->id_movie);
        return Database::getRows($sql, $params);
    }
}

?>