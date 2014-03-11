<?php
/**
 * Object executes sql queries
 */
class QueryExecutor{

	/**
	 * executes the SQL query passed by parameter
	 *
	 * @param sqlQuery object of type SqlQuery
	 * @return resultSet
	 */
	public static function execute($sqlQuery){
		/*$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}*/		
		
		$connection = new Connection();
		$query = $sqlQuery->getQuery();

		$result = $connection->executeQuery($query);
		if(!$result){
			throw new Exception("SQL Error: -->".$query."<--" . mysql_error());
		}
		$i=0;
		$tab = array();
		while ($row = mysql_fetch_array($result)){
			$tab[$i++] = $row;
		}
		$connection->close();
		
		mysql_free_result($result);
		$connection->close();
		
		/*if(!$transaction){
			$connection->close();
		}*/
		return $tab;
	}
	
	
	public static function executeUpdate($sqlQuery){
		/*$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}*/		
		
		$connection = new Connection();
		$query = $sqlQuery->getQuery();
		$result = $connection->executeQuery($query);
		if(!$result){
			throw new Exception("SQL Error: -->".$query."<--" . mysql_error());
		}
		return mysql_affected_rows();		
	}

	public static function executeInsert($sqlQuery){
		QueryExecutor::executeUpdate($sqlQuery);
		return mysql_insert_id();
	}
	
	/**
	 * Wykonaniew zapytania do bazy
	 *
	 * @param sqlQuery obiekt typu SqlQuery
	 * @return wynik zapytania 
	
	public static function queryForString($sqlQuery){
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}
		$result = $connection->executeQuery($sqlQuery->getQuery());
		if(!$result){
			throw new Exception("SQL Error: -->".$sqlQuery->getQuery()."<--" . mysql_error());
		}
		$row = mysql_fetch_array($result);		
		return $row[0];
	} */

}
?>