<?php
/*
 * Class that operate on table 'scores'. Database Mysql.
 *
 * @date: 2014-03
 */
class ScoresMySqlDAO implements ScoresDAO{

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function getXLastScores(){
		$sql = 'SELECT * FROM scores ORDER BY date DESC LIMIT 5';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	

		
	/**
 	 * Insert record to table
 	 *
 	 * @param Score score
 	 */
	public function insert($score){
		$sql = 'INSERT INTO scores (points,name,date) VALUES (?, ?, ?)';
		
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($score->points);
		$sqlQuery->setString($score->name);
		$sqlQuery->setString($score->date);

		
		$id = $this->executeInsert($sqlQuery);	
		$score->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param Score score
 	 */
	public function update($score){
		$sql = 'UPDATE scores SET points = ?, date = ? WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($score->points);
		$sqlQuery->setString($score->date);
		$sqlQuery->setString($score->name);

		return $this->executeUpdate($sqlQuery);
	}
	
	
	/**
	 * Read row
	 *
	 * @return Score 
	*/
	protected function readRow($row){
		$score = new Score;
		$score->points = $row['points'];
		$score->name = $row['name'];
		$score->date = $row['date'];
		return $score;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
			$score = new Score;
			$score = $ret[$i];

		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return Score 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 **/
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	} 

	
}
?> 