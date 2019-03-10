<?php 

    class Customers{
    
        public function GetCustomers()
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

        
    }

?>