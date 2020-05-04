<!DOCTYPE html>
<?php
session_start();

	$validForm = "";
	$emailFail = "";
	$emailSuccess = "";
	

	if(isset($_POST['emailSubmit'])){
		
		
		
		$toEmail = $_POST['email'];	//pull email address from the form data  || will send the email to the email address entered on the form
		
		$subject = "RECIPES Newsletter";	//This is the message that will be sent back to the person who sent you a message from your contact form.
		$subjectInterest = "New Interest";
		
		$emailBody = "Thank you for taking an interest in our Newsletter. You will be receiving our latest issue soon!";
		$emailBodyInterest = "$toEmail has taken interest in our Newsletter.";
		
		$fromEmail = "mmason@designdefined.org";		//email address is coming from
		
		$headers = "From: $fromEmail" . "\r\n";
		
		
		//validate email address
		function validateEmail($inEmail){
			global $validForm, $emailFail;
			$emailFail = "";
			
			if(!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/",$inEmail)){
				$validForm = false;
				
				$emailFail = "Not a valid email address.";
			}
			
		}
		
		
		$validForm = true;
		
		validateEmail($toEmail);
		
		if($validForm){
		
				if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email
					{
						//echo("<p>Message successfully sent!</p>");
						$emailSuccess = "Message sent successfully!";

					
						//sends emnail to the host account that someone has taken interest
						//includes their email
						mail($fromEmail,$subjectInterest,$emailBodyInterest,$headers);

						//echo $emailBodyInterest;
					} 
					else 
					{
						echo("<p>Message delivery failed...</p>");
					}
				}
		
				
	}


?>

<html>
	
<link rel="stylesheet" type="text/css" href="recipe.css">
<link rel="stylesheet" type="text/css" href="emailer.css">
	
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
	
	<li><a href="recipeProjectNews.php"  style="color: #000000">Newsletter</a></li>
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
	
<p class="fillOut" >Enter your email address below to sign up for our free Newsletter!</p>
	<p align="center" style="color: red"><?php echo $emailFail?></p>
	<p align="center" style="color: green"><?php echo $emailSuccess; ?></p>
	
	<div id="formcontainer">
	<form id="contact_form" method="post" action="recipeProjectNews.php">
	

		<fieldset1>
			<div>
				<label for="email">Email Address</label>
				<input id="email" name="email" type="text" >
			</div>
			
		</fieldset1>
		
		<fieldset2>
		
			<div>
				<input type="submit" id="button" name="emailSubmit" value="Submit">
			</div>
		</fieldset2>
		
		
	</form>	
	</div>
	

</body>
</html>