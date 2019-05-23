<?php 
class Favorites extends Validator{
    private $id;
    private $movie_id;
    private $user_id;
    
    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
      
    public function movie_id($value){
        if($this->validateId($value)){
            $this->movie_id=$value;
            return true;
        }
        else{
            return false;
        }
    }
      
    public function user_id($value){
        if($this->validateId($value)){
            $this->user_id=$value;
            return true;
        }
        else{
            return false;
        }
    }

    public function exist(){
        $sql='SELECT favorites.movies, favorites.user FROM favorites WHERE favorites.movies=? AND favorites.user=?';
        $params=array($this->movie_id,$this->user_id);
        return Database::getRow($sql,$params);
    }
    public function create(){
        $sql='INSERT INTO favorites(user, movies) VALUES(?,?)';
        $params=array($this->user_id,$this->movie_id);
        return Database::executeRow($sql,$params);
    }
    public function delete(){
        $sql='DELETE FROM favorites WHERE user=? AND movies=?';
        $params=array($this->user_id,$this->movie_id);
        return Database::executeRow($sql,$params);
    }
    public function showFavoritesinUser(){
        $sql='  SELECT favorites.id, movies.id AS IdMovie, movies.name, movies.sinopsis, movies.cover 
                FROM movies, favorites, users 
                WHERE movies.id=favorites.movies 
                AND users.id=favorites.user 
                AND users.id=?
        ';
        $params=array($this->user_id);
        return Database::getRows($sql,$params);
    }
    public function NumberofFavoritesbyUser()
    {
        $sql='SELECT COUNT(*) AS NumberMovies FROM favorites WHERE user=?';
        $params=array($this->user_id);
        return Database::getRow($sql,$params);
    }
}
?>