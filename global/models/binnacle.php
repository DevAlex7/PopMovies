<?php 
class Binnacle extends Validator{
    private $id;
    private $actionperformed;
    private $user_id;
    private $admin_id;
    private $site;

    

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
        
            $this->actionperformed= $value;
            return true;
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
    public function site($value){
        if($this->ValidateSite($value)){
            $this->site=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function create(){
        $sql='INSERT INTO binnacle(actionperformed, user_id, admin_id, date , year, site) VALUES(?,?,?,?,?,?)';
        $params=array($this->actionperformed, $this->user_id, $this->admin_id, $today=date("Y-m-d"), $year=date("Y"),$this->site);
        return Database::executeRow($sql, $params);
    }
    public function actionsInAdmins(){
        $sql='SELECT admins.id, admins.username AS adminUser, binnacle.actionperformed, binnacle.site FROM admins, binnacle WHERE admins.id=binnacle.admin_id ORDER BY binnacle.id DESC';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
    public function actionsInClients(){
        $sql='SELECT users.username AS ClientUser, binnacle.actionperformed FROM users, binnacle WHERE users.id=binnacle.user_id ORDER BY binnacle.id DESC';
        $params=array(null);
        return Database::getRows($sql, $params);
    }
}
?>