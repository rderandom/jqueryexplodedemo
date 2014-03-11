<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>TESTER</title>
		
    </head>
    <body>
		
		<?php
		ini_set('display_startup_errors',1);
		ini_set('display_errors',1);
		error_reporting(E_ALL);

		//http://gyazo.com/ea725b6f81cc762afac22f81a0374c3a.png
		try {
			require_once('include.php');
     	} catch (Exception $e) {
			echo $e;     
        }


		 try {
			$cx = new Connection(); //its needed to instance Connection due to server errors with mysql_replace function
			$scoresDao = new ScoresMySqlDAO();
		   
			$listfOfScores = $scoresDao->getXLastScores();
			
			for($i=0;$i<sizeof($listfOfScores);$i++){
				$post = $listfOfScores[$i]; 
				echo "score->name: ";
				echo $post->name;
				echo "___\n";
			}	
		   
		   $score = new Score;
		   $score->points =10;
		   $score->name="myname";
			 // $scoresDao->insert($score);

		} catch (Exception $e) {
			echo $e;     
        }



        ?>

		<form action="NewScoreController.php" method="POST">	
		<input type="text" name="name">  <input type="text" name="score">  
		<input type="submit" value="goes"/> <br/>  </form>
		
    </body>
</html>