<?php 

class Customers extends Validator{

        private $id;
        private $name;
        private $email;
        private $enterprise;

        private $search;
    
        public function id($value){
            
            if($this->validateId($value)){
                $this->id = $value;
                return true;
            }
            else
            {
                return false;
            }
        }
        public function name($value){
            if($this->validateAlphabetic($value, 1, 50)){
                $this->name = $value;
                return true;
            }
            else{
                return false;
            }
        }
        public function search($value){
            if($this->validateAlphabetic($value, 1, 50)){
                $this->search = $value;
                return true;
            }
            else{
                return false;
            }
        }
        public function email($value){
            if($this->validateEmail($value)){
                $this->email = $value;
                return true;
            }
            else
            {
                return false;
            }
        }
        public function enterprise($value){
            if($this->validateAlphabetic($value,2,30)){
                $this->enterprise = $value;
                return true;
            }
            else{
                return false;
            }
        }
        
        public function all()
	    {
            $sql = 'SELECT name, email, enterprise FROM customers';
            $params = array(null);
            return Database::getRows($sql, $params);
        }
        public function GetCountCustomers()
	    {
            $sql = 'SELECT COUNT(*) FROM customers AS count';
            $params = array(null);
            return Database::getRow($sql, $params);
        }
        public function exist(){
            $sql = 'SELECT email FROM customers WHERE email=?';
            $params = array($this->email);
            return Database::getRow($sql, $params);
        }
        public function create(){
            $sql ='INSERT INTO customers (name, email, enterprise) VALUES (?,?,?)';
            $params = array($this->name, $this->email, $this->enterprise);
            return Database::executeRow($sql, $params);
        }
        public function update(){

        }
        public function delete(){

        }
        public function find(){
            $sql = 'SELECT name FROM customers WHERE name=?';
            $params = array($this->name);
            return Database::getRow($sql, $params);
        }
        public function findallbynamefields(){
            $sql= 'SELECT name, email, enterprise FROM customers WHERE name=? OR email=? OR enterprise=?';
            $params = array($this->search, $this->search, $this->search);
            return Database::getRows($sql, $params);
        }
    }
?>