<?php
/**
 * Object represents connection to database
 */
class Connection{
	private $connection;

	//Public constructor
	public function Connection(){
		$this->connection = ConnectionFactory::getConnection();
	}

	//Closing connection
	public function close(){
		ConnectionFactory::close($this->connection);
	}

	/**
	 * Execute SQL sentence
	 *
	 * @param string with SQL query
	 * @return resultset
	 */
	public function executeQuery($sql){
		return mysql_query($sql, $this->connection);
	}
}
?>