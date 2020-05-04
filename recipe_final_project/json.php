<?php

	$q = intval($_GET['q']);

	try {
	  
	  require "PDO_connectionFile.php";	//CONNECT to the database
	  
	  
	  $sql = "SELECT recipe_id, recipe_creator, recipe_name, recipe_servings, recipe_time, recipe_difficulty, recipe_ingred_num, recipe_ingred_unit, recipe_ingred, recipe_instruct, recipe_photo
			FROM recipe_data WHERE recipe_id = '".$q."'"; //
	  
		
	  //PREPARE the SQL statement
	  $stmt = $conn->prepare($sql);
	  
	  //EXECUTE the prepared statement
	  $stmt->execute();		
	  
	  //Prepared statement result will deliver an associative array
	  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  }
  
  catch(PDOException $e)
  {
	  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

	  error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
	  error_log($e->getLine());
	  error_log(var_dump(debug_backtrace()));
  
	  //Clean up any variables or connections that have been left hanging by this error.		
  			
  }

	//formatting the output when a recipe is selected
			while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				
				$valIncrem = 0;
				$instructIncrem = 0;
				
				echo "<img src='images/".$row['recipe_photo']."' >";
				
				echo "<h3>Selected Recipe: ".$row['recipe_name']."</h3>";
				
				echo "<p>Created By: ".$row['recipe_creator']."</p>";
				
				echo "<p>Number of Servings: <span id='recipeTotalServe'>".$row['recipe_servings']."</span></p>";
				
				echo "<p>Approximate Time: ".$row['recipe_time'] . " Minutes</p>";
				
				echo "<p>Level of Difficulty: ".$row['recipe_difficulty']."</p>";
				
				echo '<p>Ingredients List: 
					<label class="switch" id="testOn">
					<input type="checkbox" id="togIngred">
					<span class="slider round"></span></label>
					<span id="ingred"></span></p>';
					
				
				echo "<div class='ingredTog' style='display: none'>";
				
				echo "<ul>";
				
				while($valIncrem < count(json_decode($row['recipe_ingred_num'], true))){
				
					$arr = json_decode($row['recipe_ingred_num'], true);
					$arr2 = json_decode($row['recipe_ingred_unit'], true);
					$arr3 = json_decode($row['recipe_ingred'], true);

					echo "<li><span class='serveSize$valIncrem'>" .$arr[$valIncrem]. "</span> " . $arr2[$valIncrem] . " " . $arr3[$valIncrem] ."</li>";
					

					$valIncrem++;
				}
				
				echo "</ul >";
				
				echo '<p>Change Serving Size: <br>
						<input type="radio" name="size" value="Half" id="serveHalf"> Half<br>
						<input type="radio" name="size" value="Double" id="serveDouble"> Double<br>
						<input type="radio" name="size" value="Normal" id="serveNormal" checked> Normal</p>';
				
				echo "</div>";
				
				
				echo '<p>Cooking Instructions: 
					<label class="switch">
					<input type="checkbox" id="togInstruct">
					<span class="slider round"></span></label>
					<span id="instruct" style="display: none"></span></p>';
				
				echo "<ol class='instructTog' style='display: none'>";
				
				while($instructIncrem < count(json_decode($row['recipe_instruct'], true))){
				
					$arr = json_decode($row['recipe_instruct'], true);

					echo "<li>" . $arr[$instructIncrem] . "</li>";

					$instructIncrem++;
				}
				
				echo "</ol>";
				
				
			}


	
?>

