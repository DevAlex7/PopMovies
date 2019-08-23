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
            $this->id_user = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_user_trust($value){
        if($this->validateId($value)){
            $this->id_user_trust = $value;
            return true;
        }
        else{
            return false;
        }
    }

    public function save(){
        $sql='INSERT INTO users_trusts (id_user, id_user_trust) VALUES (?, ?)';
        
        $params = array($this->id_user, $this->id_user_trust);
        print var_dump($params);
        return Database::executeRow($sql,$params);
    }
    public function getTrustUsersbyId(){
        $sql='SELECT admins.id, admins.name, admins.lastname, admins.email FROM (users_trusts INNER JOIN admins ON admins.id = users_trusts.id_user_trust AND users_trusts.id_user=?)';
        $params = array($this->id_user);
        return Database::getRows($sql,$params);
    }
}
?>