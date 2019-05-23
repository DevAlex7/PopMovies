<?php 

class Gender extends Validator{  
    private $id;
    private $name;
    private $cover;
    private $imageroot='../../../resources/home/img/';
    private $search;


    public function id($value)
    {
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function name($value){
        if($this->validateAlphabetic($value, 1, 20)){
            $this->name = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getImage(){
        return $this->cover;
    }
    public function getRoot(){
        return $this->imageroot;
    }
    public function cover($file, $name){
        if($this->validateImageFile($file,$this->imageroot,$name,500,500)){
            $this->cover=$this->getImageName();
            return true;
        }
        else{
            return false;
        }
    }
    public function getGendername(){
        return $this->name;
    }
    public function searchbyInput($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->search=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function exist()
    {
        $sql = 'SELECT gender FROM genders WHERE gender=?';
        $params = array($this->name);
        return Database::getRow($sql, $params);
    }
    public function find(){
        $sql='SELECT id, gender,cover FROM genders WHERE id=?';
        $params=array($this->id);
        return Database::getRow($sql, $params);
    }
    public function getMoviesbyGenders(){
        $sql='SELECT movies.name FROM movies, genders, gendersmovie WHERE movies.id=gendersmovie.movie AND genders.id=gendersmovie.gender AND genders.id=?';
        $params=array($this->id);
        return Database::getRows($sql, $params);
    }
    public function all()
    {
         $sql='SELECT * FROM genders';
         $params =null;
         return Database::getRows($sql, $params);
    }
    public function create()
    {
        $sql = 'INSERT INTO genders(gender, cover) VALUES(?,?)';
        $params = array($this->name,$this->cover);
        return Database::executeRow($sql, $params);
    }
    public function edit(){
        $sql='UPDATE genders SET gender=?, cover=? WHERE id=?';
        $params=array($this->name, $this->cover, $this->id);
        return Database::executeRow($sql, $params);
    }
    public function delete()
    {
        $sql ='DELETE FROM genders WHERE id=?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
    public function search(){
        $sql='SELECT * FROM genders WHERE genders.gender LIKE ?';
        $params=array("%$this->search%");
        return Database::getRows($sql,$params);
    }
}

?>