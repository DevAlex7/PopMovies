<?php 

class Comment extends Validator{
    private $id;
    private $id_movie;
    private $id_user;
    private $comment;

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
    public function id_user($value){
        if($this->validateId($value)){
            $this->id_user=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function talk($value){
        if(strlen($value)>=5){
            $this->comment=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getComment(){
        return $this->comment;
        return true;
    }
    public function create(){
        $sql='INSERT INTO moviecomments(id_movie,id_user, comment) VALUES (?,?,?)';
        $params=array($this->id_movie,$this->id_user,$this->comment);
        return Database::executeRow($sql,$params);
    }
    public function Show_Comments_in_Movies_byId(){
        $sql='  SELECT movies.id, users.id AS userId, users.username, moviecomments.id AS IdUserComment, moviecomments.comment 
                FROM (
                (moviecomments INNER JOIN users on moviecomments.id_user=users.id) 
                INNER JOIN movies ON moviecomments.id_movie=movies.id AND movies.id=?) 
                ORDER BY moviecomments.id';
        $params=array($this->id_movie);
        return Database::getRows($sql,$params); 
    }
    public function findbyId(){
        $sql='SELECT * FROM moviecomments WHERE id=?';
        $params=array($this->id);
        return Database::getRow($sql,$params);
    }
    public function edit(){
        $sql='UPDATE moviecomments SET comment=? WHERE id=?';
        $params=array($this->comment,$this->id);
        return Database::executeRow($sql,$params);
    }
    
}


?>