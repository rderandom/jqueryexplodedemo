<?php
	try {
		require_once('include.php');
	} catch (Exception $e) {
		echo $e;     
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$cx = new Connection(); //its needed to instance Connection due to server errors with mysql_replace function
		$scoresDao = new ScoresMySqlDAO();
		$listfOfScores = $scoresDao->getXLastScores();
		//return json_encode($listOfPosts);
		
		return 'jhhkjhjhjhjhhjhjhj';
			
	} 
?>