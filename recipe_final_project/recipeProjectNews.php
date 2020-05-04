<!DOCTYPE html>
<?php
session_start();

	$validForm = "";
	$emailFail = "";
	$emailSuccess = "";
	$name = "";
	$question = "";
	$toEmail = "";
	$errQuestion = "";
	$errName = "";
	

	if(isset($_POST['emailSubmit'])){
		
		
		
		
		$name = $_POST['memName'];
		$question = $_POST['memQuestion'];
		
		$toEmail = $_POST['email'];	//pull email address from the form data  || will send the email to the email address entered on the form
		
		$subject = "RECIPES: Questions";	//This is the message that will be sent back to the person who sent you a message from your contact form.
		$subjectQuestion = "New Question";
		
		$emailBody = "Thank you for your questions, we will get back to you as soon as possible!
					  $question";
		
		
		$emailBodyQuestion = "$name has a question they need answered.
							  $toEmail
							  $question";
		
		$fromEmail = "mmason@designdefined.org";		//email address is coming from
		
		$headers = "From: $fromEmail" . "\r\n";
		
		
		//validate name field
		function validateName($inName){
			global $validForm, $errName;
			$errName = "";
			
			if(!preg_match("/^[a-zA-Z ]*$/", $inName)){
				$validForm = false;
				
				$errName = "<span class='errStyle' style='margin-left: 160px; color: red';>Only letters and white spaces allowed</span>";
			}
			else if($inName == ""){
				$validForm = false;
				$errName = "<span class='errStyle' style='margin-left: 160px; color: red'>Field can not be blank</span>";
			}
			
		}
		
		//validate email address
		function validateEmail($inEmail){
			global $validForm, $emailFail;
			$emailFail = "";
			
			if($inEmail == ""){
				$validForm = false;
				
				$emailFail = "<span style='color: red; margin-left: 160px;'>Please enter an email address</span>";
			}
			elseif(!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/",$inEmail)){
				$validForm = false;
				
				$emailFail = "<span style='color: red; margin-left: 160px;'>Not a valid email address.</span>";
			}
			
		}
		
		//validate name field
		function validateQuestion($inQuestion){
			global $validForm, $errQuestion;
			$errQuestion = "";
			
			if($inQuestion == ""){
				$validForm = false;
				$errQuestion = "<span class='errStyle' style='margin-left: 160px; color: red'>Please ask a question</span>";
			}
			
		}
		
		
		$validForm = true;
		
		validateName($name);
		validateEmail($toEmail);
		validateQuestion($question);
		
		if($validForm){
		
				if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email
					{
						//echo("<p>Message successfully sent!</p>");
						$emailSuccess = "Message sent successfully!";

					
						//sends emnail to the host account that someone has taken interest
						//includes their email
						mail($fromEmail,$subjectQuestion,$emailBodyQuestion,$headers);

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
	
	<li><a href="recipeProjectNews.php"  style="color: #000000">Questions</a></li>
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
	
<p id="recTitle">Ask us a Question!</p>
	
	<p align="center" style="color: green"><?php echo $emailSuccess; ?></p>
	
	<div id="formcontainer">
	<form id="contact_form" method="post" action="recipeProjectNews.php">
	

		<fieldset1><?php echo $errName ?>
			<div style="margin-left: 53px;">
				<label for="memName">Name</label>
				<input id="memName" name="memName" type="text" style="width: 300px;" value="<?php echo $name ?>">
			</div>
			<br>
			<?php echo $emailFail?>
			<div>
				<label for="email">Email Address</label>
				<input id="email" name="email" type="text" style="width: 300px;" value="<?php echo $toEmail ?>">
			</div>
			<br>
			<?php echo $errQuestion ?>
			<div style="margin-left: 0px;">
				<label for="memQuestion">Question</label>
				<textarea style="resize: vertical" rows="3" cols="29" name="memQuestion" form="contact_form"><?php echo $question ?></textarea>
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