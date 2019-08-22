<?php 
class user_Trusts extends Validator{
    private $id;
    private $id_user;
    private $id_user_trust;

    public function id($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_user($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_user_trust($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }
        else{
            return false;
        }
    }

    public function save(){
        $sql='INSERT INTO users_trusts VALUES (NULL, ?, ?)';
        $params = array($this->id_user,$this->id_user_trust);
        return Database::executeRow($sql,$params);
    }
    public function getTrustUsersbyId(){
        $sql='SELECT admins.id, admins.name, admins.lastname, admins.email FROM (users_trusts INNER JOIN admins ON admins.id = users_trusts.id_user_trust AND users_trusts.id_user=?)';
        $params = array($this->id_user);
        return Database::getRows($sql,$params);
    }
}
?>