<?php 

class Trending extends Validator{
    private $id_movie;
    private $id_user;

    public function id_movie($value){
        if($this->validateId($value)){
            $this->id_movie=$value;
            return true;
        }
        else{
            return false;
        }
    }

    public function id_user($value){
        if($this->validateId($value)){
            $this->id_user=$value;
            return true;
        }
        else{
            return false;
        }
    }

    public function getTrendings(){
        $sql='  SELECT movies.name, movies.cover, movies.sinopsis, COUNT(favorites.movies) AS trendingTotal 
                FROM favorites 
                LEFT JOIN movies 
                ON favorites.movies=movies.id 
                GROUP BY favorites.movies 
                ORDER BY trendingTotal DESC';
        $params=array(null);
        return Database::getRows($sql,$params);
    }   
}
?>