<?php
/*
 * Class that returns connection to database
 * and closes a connection passed by parameter.
 */
class ConnectionFactory{
	
	/**
	 * @return $conn
	 */
	static public function getConnection(){
		$conn = mysql_connect(ConnectionProperties::getHost(), ConnectionProperties::getUser(), ConnectionProperties::getPassword());
		mysql_select_db(ConnectionProperties::getDatabase());
		if(!$conn){
			throw new Exception('could not connect to database');
		}
		return $conn;
		
	}

	/**
	 * closes $conn
	 */
	static public function close($con){
		if( gettype($con) == "resource") {
			mysql_close($con);
		}
		
	}
	
}
?>