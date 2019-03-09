<?php 

    class Customers{
    
        public function GetCustomers()
	    {
            $sql = 'SELECT name, email, enterprise FROM customers';
            $params = array(null);
            return Database::getRows($sql, $params);
	    }
    }

?>