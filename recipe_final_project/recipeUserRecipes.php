
<!DOCTYPE html>
<?php
session_start();

include 'userRecipe.php';


	try {
	  
	  require "PDO_connectionFile.php";	//CONNECT to the database
	  
	  
	  $sql = "SELECT recipe_id, recipe_creator, recipe_name, recipe_servings, recipe_time, recipe_difficulty, recipe_ingred_num, recipe_ingred_unit, recipe_ingred, recipe_instruct, recipe_photo
			FROM recipe_data"; //
	  
		
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
?>


<html>
	

	
<link rel="stylesheet" type="text/css" href="recipe.css">
<link rel="stylesheet" type="text/css" href="userRecipe.css">
	
<script src="recipe.js"></script>
	
<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed&display=swap" rel="stylesheet">
	
<head>

<title>Recipe Project</title>
	

</head>
<div id="top"></div>
<header>	
<img src="images/recipeHeader.jpg" width="1100" alt="recipe header">
</header>	
<body>


	
	
<nav>
<ul>
	<li><a href="recipeProject.php">View Recipes</a></li>
	<?php if(isset($_SESSION["validUser"])  &&  $_SESSION["validUser"] == "yes" ){ ?>
	<li><a href="recipeProjectSubmit.php">Submit Recipe</a></li>
	<?php 
		}else{
	?>
	<?php } ?>
	<li><a href="recipeProjectNews.php">Questions</a></li>
	<li><a href="recipeUserRecipes.php" style="color: #000000">User Recipes</a></li>
	<?php if(isset($_SESSION["validUser"])  &&  $_SESSION["validUser"] == "yes" ){ ?>
	<li><a href="logout.php">Logout</a></li><p style="display: inline"><span class="vl">&nbsp;&nbsp;Welcome, <?php echo $_SESSION['user']; ?>&nbsp;&nbsp;</span></p>
	<?php 
		}else{
	?>
	<li><a href="recipeProjectLogin.php">Login</a></li>
	<?php } ?>
</ul>
</nav>
	
	<hr style="margin-top: -35px; margin-bottom: 130px">

	<?php if(isset($_SESSION["validUser"])  &&  $_SESSION["validUser"] == "yes" ){ ?>
	
	
	<div class="recTitle">
		<p>User Submitted Recipes</p>
	</div>
	
	
	
	<div class="flex-container">
		
		<?php 
			while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		?>  

	
		<figure onClick="showRecipe(<?php echo $row['recipe_id'] ?>)"><?php echo "<img src='images/".$row['recipe_photo']."' >"; ?>
			<h3><?php echo $row['recipe_name']; ?></h3>

			<p>Number of Servings: <?php echo $row['recipe_servings']?></p>
			<p>Approximate Time: <?php echo $row['recipe_time']?> Minutes</p>	
			<p>Level of Difficulty: <?php echo $row['recipe_difficulty']?></p>
			<p>Cook: <?php echo $row['recipe_creator']?></p>
		</figure>
		
		 <?php
			// 
			}
		?>	
	
	</div>
	
	<hr>
	
	<?php  }else{  ?>
	
	<div class="recTitle" style="margin-top: 100px">
		<p><u>If you'd like to view our user submitted recipes, please log in!</u></p>
	</div>
	
	<?php } ?>
	
	<div class="recipeflex">
		<recipefigure>
			<div id="recInstruct">
			
			</div>	
		</recipefigure>
	</div>

	

	<a href="#top"><p align="center" style="margin-bottom: 60px; margin-top: 60px;">Back to Top</p></a>	
</body>
</html>