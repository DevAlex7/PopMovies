<?php 
class Binnacle extends Validator{
    private $id;
    private $actionperformed;
    private $user_id;
    private $admin_id;
    

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function actionperformed($value){
        if($this->validateAlphabetic($value,1,150)){
            $this->actionperformed= $value;
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
    public function admin_id($value){
        if($this->validateId($value)){
            $this->admin_id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function create(){
        $sql='INSERT INTO binnacle(actionperformed, user_id, admin_id, date) VALUES(?,?,?,?)';
        $params=array($this->actionperformed, $this->user_id,$this->admin_id, $today=date("Y-m-d"));
        return Database::executeRow($sql, $params);
    }
    public function all(){
        $sql='SELECT * FROM binnacle';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
}
?>