<?php 
date_default_timezone_set("America/El_Salvador");
class adminusers extends Validator{
    
    private $id;
    private $name;
    private $lastname;
    private $username;
    private $email;
	private $password;
	private $date_created;
	private $role;
	private $status;

    public function id($value)
    {
        if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
    }
    public function getId()
	{
		return $this->id;
	}

    public function name($value){
        if ($this->validateAlphabetic($value, 1, 50)) {
			$this->name = $value;
			return true;
		} else {
			return false;
		}
    }
    public function getName()
	{
		return $this->name;
	}

    public function lastname($value){
        if ($this->validateAlphabetic($value, 1, 50)) {
			$this->lastname = $value;
			return true;
		} else {
			return false;
		}
    }
    public function getLastname(){
        return $this->lastname;
    }

    public function username($value){
        if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->username = $value;
			return true;
		} else {
			return false;
		}
    }
    public function getUsername(){
        return $this->username;
    }

    public function email($value)
    {
		if ($this->validateEmail($value)) {
			$this->email = $value;
			return true;
		} else {
			return false;
		}
    }
    public function getEmail(){
        return $this->email;
	}
	
    public function getRole()
	{
		return $this->role;
	}

    public function getStatus()
	{
		return $this->status;
	}
    public function password($value){
        if ($this->validatePassword($value)) {
			$this->password = $value;
			return true;
		} else {
			return false;
		}
    }
    public function getPassword(){
        return $this->password;
	}
	public function date_created($value)
	{
		if($value < date('Y-m-d')){
			$this->date_created = $value;
			return true;
		}
		else{
			return false;
		}
	}	
	public function getCreated(){
		return $this->date_created;
	}

    public function checkUsername()
	{
		$sql = 'SELECT id, name, lastname, email, role, status, created_profile_at FROM admins WHERE username = ?';
		$params = array($this->username);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id'];
			$this->name = $data['name'];
			$this->lastname = $data['lastname'];
			$this->email = $data['email'];
			$this->role = $data['role'];
			$this->status = $data['status'];
			$this->date_created = $data['created_profile_at'];
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT password FROM admins WHERE id = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->password, $data['password'])) {
			return true;
		} else {
			return false;
		}
	}

	public function LogOff(){
		if(isset($_SESSION['idUsername'])){
			unset($_SESSION['idUsername']);
			unset($_SESSION['AdminUsername']);
			unset($_SESSION['AdminName']);
			unset($_SESSION['AdminLastname']);
			return true;
		}	
		else
		{
			return false;
		}	
	}
	public function checkStatus(){
		$sql='SELECT status FROM admins WHERE id=?';
		$params = array($this->id);
		$response =  Database::getRow(
			$sql, $params
		);
		if($response['status'] == 0){
			return true;
		}
		else if($response['status'] == 1 || 2){
			return false;
		}
	}
	public function checkSession(){
		$value = $this->getId();
		if($value == ''){
			if(isset($_SESSION['idUsername'])){
				if($_SESSION['idUsername'] != $value ){
					return true;
				}
				else{
					return false;
				}
			}
		}
		else{
			return true;
		}
		
	}
    public function checkUsers(){
        $sql='SELECT name, lastname, username, email FROM admins ORDER BY lastname';
        $params = array(null);
        return Database::getRows($sql, $params);
	}
	public function setBlockUser(){
		$sql = 'UPDATE admins SET status=? WHERE id=?';
		$params = array(1,$this->id);
		return Database::executeRow($sql,$params);
	}	
    public function create(){
        $hash=password_hash($this->password, PASSWORD_DEFAULT);
        $sql='INSERT INTO admins (name, lastname, username, email, password, created_profile_at, role, status ) VALUES (?,?,?,?,?,?,?,?)';
        $params=array($this->name, $this->lastname,$this->username,$this->email, $hash,date('Y-m-d'),0,0);
        return Database::executeRow($sql, $params);
	}
	public function all(){
		$sql='SELECT * FROM admins WHERE admins.id NOT IN (?)';
		$params=array($_SESSION['idUsername']);
		return Database::getRows($sql, $params);
	}
	public function allbyId(){
		$sql='SELECT * FROM admins WHERE id=?';
		$params=array($this->id);
		return Database::getRow($sql, $params);
	}
	public function edit(){
		$sql='UPDATE admins SET name=?, lastname=?, username=?, email=? WHERE id=?';
		$params=array($this->name, $this->lastname, $this->username, $this->email, $this->id);
		return Database::executeRow($sql,$params);
	}
	public function destroy(){
		$sql='DELETE FROM admins WHERE id=?';
		$params=array($this->id);
		return Database::executeRow($sql, $params);
	}
	public function changePassword(){
		$hash = password_hash($this->password , PASSWORD_DEFAULT);
		$sql='UPDATE admins SET password=? WHERE id=?';
		$params=array($hash, $this->id);
		return Database::executeRow($sql,$params);
	}
	public function existsInTrusts(){
		$sql='SELECT admins.id, admins.name, admins.lastname FROM admins WHERE NOT EXISTS (SELECT 1 FROM users_trusts WHERE admins.id = users_trusts.id_user_trust AND users_trusts.id_user=?) AND admins.id NOT IN (?)';
		$params = array($this->id, $this->id);
		return Database::getRows($sql,$params);
	}
	public function blockUsers(){
		$sql='SELECT admins.id AS idUser, name, lastname, username, email, status.status FROM (admins INNER JOIN status ON status.id = admins.status) WHERE status.id =1';
		$params = array(null);
		return Database::getRows($sql,$params);
	}
	public function setActiveUser(){
		$sql ='UPDATE admins SET status=? WHERE id=?';
		$params=array(0,$this->id);
		return Database::executeRow($sql,$params);
	}
	public function insertAnswer(){
		$sql='INSERT INTO answers_reset (username, date_answer) VALUES (?,?)';
		$params = array($this->username, $this->date_created);
		return Database::executeRow($sql,$params);
	}
	public function getAnswers(){
		$sql ='SELECT * FROM answers_reset';
		$params = array(null);
		return Database::getRows($sql,$params);
	}
	public function differenceDays(){
		$today = date('Y-m-d');

		//Conseguir la fecha de cambio
		$dateChange = strtotime ( '+90 day' , strtotime ( $today ) ) ;
		$dateChange = date ( 'Y-m-d' , $dateChange );

		//fecha de creación
		$dateCreated= new DateTime($today);
		$dateChangeP = new DateTime($dateChange);
		$diff = $dateCreated->diff($dateChangeP);

		return $diff->days;
		
	}
}

?>