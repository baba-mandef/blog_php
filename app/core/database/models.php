<?php
/**
 * THIS FILE HELP TO MANAGE THE LOGIC UNDER OUR DATABASE ACTIONS
 **/
  class Model{
	// Database object class
	  
    private function conn(){
		// Create and return a database connection stream
        require_once 'app/config.php';
      
        $data_base_connector = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
        return $data_base_connector;

    }

    public function add($table, $fields, $values, $data){
		// create and save a database object
      $db = $this->conn();
      $create_request = $db->prepare('INSERT INTO '.$table.'('.$fields.') VALUES('.$values.')');
      $create_request->execute($data);

    }
    public function read($table, $field)
		{
      		// get and return a database object
			$db=$this->conn();
			$read_request=$db->query('SELECT '.$field.' FROM '.$table.'');
			return $read_request;
		}

    public function read_filter_once($table, $field, $sfield, $value)
		{
      		// get and return a database object
			$db=$this->conn();
			$read_request=$db->prepare('SELECT '.$field.' FROM '.$table.' WHERE '.$sfield.'=?');
			$read_request->execute($value);
			return $read_request;
		}
		
		public function read_filter_or($table, $field, $sfield1, $sfield2, $values)
		{
      		// get and return a database object
			$db=$this->conn();
			$read_request=$db->prepare('SELECT '.$field.' FROM '.$table.' WHERE '.$sfield1.'=? OR '.$sfield2.'=?');
			$read_request->execute($values);
			return $read_request;
		}

  }
// author @ptahemdjehuty
?>