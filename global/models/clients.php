<?php 
class Clients extends Validator{
    private $id;
    private $uname;
    private $lastname;
    private $email;
    private $username;
    private $upassword;
    private $membership;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getId(){
        return $this->id;
    }

    public function uname($value){
        if($this->validateAlphabetic($value, 5, 30)){
            $this->uname=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getName(){
        return $this->uname;
    }
    public function lastname($value){
        if($this->validateAlphabetic($value, 5, 30)){
            $this->lastname=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getLastname(){
        return $this->lastname;
    }
    public function email($value){
        if($this->validateEmail($value)){
            $this->email=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getEmail(){
        return $this->email;
    }
    public function username($value){
        if($this->validateAlphanumeric($value,7,30)){
            $this->username=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getUsername(){
        return $this->username;
    }
    public function upassword($value){
        if($this->validateAlphanumeric($value,8,30)){
            $this->upassword=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function membership($value){
        if($this->validateId($value)){
            $this->membership=$value;
            return true;
        }
        else{
            return false;
        }
    }
    
    public function checkUsername(){
        $sql='SELECT id, uname, lastname FROM users WHERE username=?';
        $params=array($this->username);
        $data = Database::getRow($sql,$params);
        if($data){
            $this->id = $data['id'];
			$this->uname = $data['uname'];
            $this->lastname = $data['lastname'];
            return true;
        }
        else{
            return false;
        }
    } 
    public function checkPassword(){
        $sql='SELECT upassword FROM users WHERE id=?';
        $params=array($this->id);
        $data = Database::getRow($sql,$params);
        if(password_verify($this->upassword,$data['upassword'])){
            return true;
        }
        else{
            return false;
        }
    }
    public function logOff(){
       if(isset($_SESSION['idClient'])){
            unset($_SESSION['idClient']);
            unset($_SESSION['ClientUsername']); 
            unset($_SESSION['ClientName']);
            unset($_SESSION['ClientLastName']);
            return true;
            
       }
       else{
           return false;
       }
    }

    public function all(){
        $sql='  SELECT users.id, uname, lastname, email, username, memberships.membership 
                FROM users,memberships 
                WHERE users.membership=memberships.id';
        $params=array(null);
        return Database::getRows($sql,$params);
    }
    public function create(){
        $hash=password_hash($this->upassword, PASSWORD_DEFAULT);
        $sql='INSERT INTO users (uname, lastname, email, username, upassword, membership) VALUES (?,?,?,?,?,?)';
        $params=array($this->uname,$this->lastname,$this->email,$this->username, $hash,$this->membership);
        return Database::executeRow($sql,$params);
    }
}


?>