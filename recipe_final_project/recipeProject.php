
<!DOCTYPE html>
<?php
session_start();

?>

<html>
	
<link rel="stylesheet" type="text/css" href="recipe.css">
	
<script src="recipe.js"></script>
	
<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed&display=swap" rel="stylesheet">
	
<head>

<title>Recipe Project</title>
	
<script src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">	
</script>
	
<script>
	
	
	
	//show/hide ingredients	
		$(document).ready(function(){		
			$("#togIngred").click(function(){		
				$("#ingred").toggle();  
			});	
		});
	
				
	//show/hide instructions
		$(document).ready(function(){
			$("#togInstruct").click(function(){
				$("#instruct").toggle();
			});	
		});
	

</script>	
	

</head>
<div id="top"></div>
<header>	
<img src="images/recipeHeader.jpg" width="1100" alt="recipe header">
</header>	
<body>


	
	
<nav>
<ul>
	<li><a href="recipeProject.php" style="color: #000000">View Recipes</a></li>
	
	<?php if(isset($_SESSION["validUser"])  &&  $_SESSION["validUser"] == "yes" ){ ?>
	<li><a href="recipeProjectSubmit.php">Submit Recipe</a></li>
	<?php 
		}else{
	?>
	
	<?php } ?>
	
	<li><a href="recipeProjectNews.php">Questions</a></li>
	<li><a href="recipeUserRecipes.php">User Recipes</a></li>
	
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
	
	<div class="recTitle">
		<p>Web Certified Recipes</p>
	</div>
	
<div class="flex-container">	

	
	<figure onClick="chiliRecipe()"><img src="images/chili.jpg" alt="chili">
		<h3>Crockpot Chili</h3>
		
		<p>Number of Servings: 6</p>
		<p>Approximate Time: 25 Minutes</p>	
		<p>Level of Difficulty: Easy</p>
	</figure>
	
   
   
	<figure onClick="meatRecipe()"><img src="images/meatLoaf.jpg" alt="Meat Loaf">
		<h3>Meat Loaf</h3>

		<p>Number of Servings: 6</p>
		<p>Approximate Time: 45 Minutes</p>	
		<p>Level of Difficulty: Medium</p>
	</figure>
  

	<figure onClick="carrotRecipe()"><img src="images/carrotSoup.jpg" alt="Carrot Soup">
		<h3>Carrot Potage</h3>

		<p>Number of Servings: 4</p>
		<p>Approximate Time: 80 Minutes</p>	
		<p>Level of Difficulty: Hard</p>
	
	</figure>
	
</div>

<hr>
	
<br>
<div class="recipeflex">
	<recipefigure>

		<span id="currentRecipe" style="display: none">

			<p><span id="image" ></span></p>

			<h3>Selected Recipe: <span id="recipe" ></span></h3>

			<p>Number of Servings: <span id="servings" ></span></p>

			<p>Approximate Time: <span id="time" ></span></p>

			<p>Level of Difficulty: <span id="difficulty" ></span></p>

			<p>Ingredients List: 
				<label class="switch">
				<input type="checkbox" id="togIngred">
				<span class="slider round"></span></label>
				<span id="ingred" style="display: none"></span></p>

			<p>Change Serving Size: <span id="half"></span> <span id="double"></span> <span id="original"></span></p>

			<p>Cooking Instructions: 
				<label class="switch">
				<input type="checkbox" id="togInstruct">
				<span class="slider round"></span></label>
				<span id="instruct" style="display: none"></span></p>


	
		</span>	
	</recipefigure>
</div>
	
<a href="#top"><p align="center" style="margin-bottom: 60px;">Back to Top</p></a>	

</body>
	
	
</html>