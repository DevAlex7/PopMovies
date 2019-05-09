<?php 

class adminusers extends Validator{
    
    private $id;
    private $name;
    private $lastname;
    private $username;
    private $email;
    private $password;

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

    public function checkUsername()
	{
		$sql = 'SELECT id, name, lastname FROM admins WHERE username = ?';
		$params = array($this->username);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id'];
			$this->name = $data['name'];
			$this->lastname = $data['lastname'];
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

    public function checkUsers(){
        $sql='SELECT name, lastname, username, email FROM admins ORDER BY lastname';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function create(){
        $hash=password_hash($this->password, PASSWORD_DEFAULT);
        $sql='INSERT INTO admins (name, lastname, username, email, password) VALUES (?,?,?,?,?)';
        $params=array($this->name, $this->lastname,$this->username,$this->email, $hash);
        return Database::executeRow($sql, $params);
	}
	public function all(){
		$sql='SELECT * FROM admins WHERE admins.id NOT IN (?)';
		$params=array($_SESSION['idUsername']);
		return Database::getRows($sql, $params);
	}
}

?>