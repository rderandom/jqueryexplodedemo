<?php
	try {
		require_once('include.php');
	} catch (Exception $e) {
		echo $e;     
	}

	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$points = $_POST['points'];
		$name = $_POST['name'];
		
		$cx = new Connection(); //its needed to instance Connection due to server errors with mysql_replace function
		$scoresDao = new ScoresMySqlDAO();
		
		$score = new Score;
		$score->points = $points;
		$score->name = $name;
		$scoresDao->insert($score);
			
	} 
?>