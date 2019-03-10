<?php 

class Movies{
    
    public function GetMovies()
	    {
            $sql = 'SELECT COUNT(*) FROM movies AS shop';
            $params = array(null);
            return Database::getRow($sql, $params);
	    }
}

?>