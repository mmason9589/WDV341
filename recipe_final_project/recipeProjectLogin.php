<!DOCTYPE html>
<?php
session_start();

	$message = "";


	if(isset($_SESSION["validUser"])  &&   $_SESSION["validUser"] == "yes" )
		{
			//User is already signed on.  Skip the rest.
			echo $returnMessage = "Welcome Back, " . $_POST["username"]; //.$_SESSION["username"];	//Create greeting for VIEW area		
		}
		else
		{

			require 'PDO_connectionFile.php';
			
			if(isset($_POST["login"]))
		  	{  
			   $userN = $_POST["username"];
			  
			   if(empty($_POST["username"]) || empty($_POST["password"]))  
			   {  
					$message = '<h3 style="color: red">All fields are required</h3>';  
			   }  
			   else  
			   {  
					$query = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name = :event_user_name AND event_user_password = :event_user_password";  
					$statement = $conn->prepare($query);  
					$statement->execute(  
						 array(  
							  'event_user_name'     	=>     $_POST["username"],  
							  'event_user_password'     =>     $_POST["password"]  
						 )  
					);  

					if($statement->rowCount() == 1)  
					{  
						 //echo "<script>alert('successful login') </script>";
						 //$message = "<h3 style='color: green'>Login Successful</h3";
						 $_SESSION["validUser"] = "yes";
						 $_SESSION["user"] = $_POST["username"];
						 header("location:recipeProject.php");
					}  
					else  
					{  
						 $_SESSION["validUser"] = "no";
						 $message = '<h3 style="color: red">Account not found. Please try again.</h3>';  
					}  
			   }  
			}
		}
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
	<li><a href="recipeUserRecipes.php">User Recipes</a></li>
	
	<?php if(isset($_SESSION["validUser"])  &&  $_SESSION["validUser"] == "yes" ){ ?>
	<li><a href="logout.php">Logout</a></li>
	<?php 
		}else{
	?>
	<li><a href="recipeProjectLogin.php" style="color: #000000">Login</a></li>
	<?php } ?>
	
	
</ul>
</nav>
	
	<hr style="margin-top: -35px; margin-bottom: 130px">
	
	<div class="errMsg"><?php echo $message; ?></div>
	
	<div class="formStyle">
		<form method="post" name="loginForm" action="recipeProjectLogin.php">  
			<label class="col-25">Username:</label>  
			<input class="col-75" type="text" name="username" value=""/>  
			<br />  <br>
			<label class="col-25">Password:</label>  
			<input  type="password" name="password" />  
			<br />  <br>
			<input id="loginSubmit" type="submit" name="login" value="Login" />  
			<br><br>

		</form>
	</div>

	

</body>
</html>