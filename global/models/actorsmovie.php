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
    public function exist(){
        $sql='
        SELECT Actor, Movie 
        FROM actorsmovie
        WHERE Actor=? AND Movie=?';
        $params=array($this->id_actor,$this->id_movie);
        return Database::getRows($sql, $params);
    }
    public function create(){
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
                actorsmovie.id, 
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
    public function edit(){
        $sql='  UPDATE actorsmovie 
                SET Actor=?, Movie=?
                WHERE id=?';
        $params=array($this->id_actor, $this->id_movie,$this->id);
        return Database::executeRow($sql, $params);
    }
    public function getNames(){
        $sql='  SELECT actors.name AS actor, movies.name AS movie 
                FROM actors, actorsmovie, movies 
                WHERE actorsmovie.Actor=actors.id AND actorsmovie.Movie=movies.id AND actors.id=? AND movies.id=?';
        $params=array($this->id_actor,$this->id_movie);
        return Database::getRow($sql, $params);
    }
    public function destroy(){
        $sql= 'DELETE FROM actorsmovie WHERE id=?';
        $params=array($this->id);
        return Database::executeRow($sql, $params);
    }
}

?>