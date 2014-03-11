<?php
/*
 * DAO interface for scores table
 *
 * @date: 2014-03
 */
interface ScoresDAO{


	/**
	 * Get X las records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function getXLastScores();
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Score score
 	 */
	public function insert($score);
	
	/**
 	 * Update record in table
 	 
 	 * @param Score score
 	 */
	public function update($score);	


}
?>