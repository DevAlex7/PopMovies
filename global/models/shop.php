<?php 

class Shop{
    public function GetShops()
	    {
            $sql = 'SELECT COUNT(*) FROM shop AS shop';
            $params = array(null);
            return Database::getRow($sql, $params);
	    }
}

?>