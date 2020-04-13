<?php


	//default values
	$emailToLogin = "";
	$firstName = "";
	$lastName = "";
	$program = "";
	$program2 = "";
	$websiteAddress = "";
	$email = "";
	$linkedIn = "";
	$websiteAddress2 = "";
	$hometown = "";
	$careerGoals = "";
	$threeWords = "";
	$inRobotest = "";
	$submitConfirm = "";

	//default Err values
	$emailToLoginErr = "";
	$firstNameErr = "";
	$lastNameErr = "";
	$programErr = "";
	$program2Err = "";
	$websiteAddressErr = "";
	$emailErr = "";
	$linkedInErr = "";
	$websiteAddress2Err = "";
	$hometownErr = "";
	$careerGoalsErr = "";
	$threeWordsErr = "";
	$inRobotestErr = "";
	$submitConfirmErr = "";

	$validForm = false;

	if(isset($_POST["submitBio"])){	
		
		$emailToLogin = $_POST["emailToLogin"];
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$program = $_POST["program"];
		$program2 = $_POST["program2"];
		$websiteAddress = $_POST["websiteAddress"];
		$email = $_POST["email"];
		$linkedIn = $_POST["linkedIn"];
		$websiteAddress2 = $_POST["websiteAddress2"];
		$hometown = $_POST["hometown"];
		$careerGoals = $_POST["careerGoals"];
		$threeWords = $_POST["threeWords"];
		$inRobotest = $_POST["inRobotest"];
		$submitConfirm = $_POST["submitConfirm"];
		
		$message = "submitted";
		
		
		//Validation functions for all fields
		
		//validate email entered
		//make sure field is not blank
		function validateEmail($inEmail){
			global $validForm, $emailToLoginErr;
			$emailToLoginErr = "";
			
			if(!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/",$inEmail)){
				$validForm = false;
				
				$emailToLoginErr = "Not a valid input.";
			}
			
		} 
		
		//validate first name entered
		//make sure field is not blank
		function validateFirstName($inFirst){
			global $validForm, $firstNameErr;
			$firstNameErr = "";
			
			if(!preg_match("/^[a-zA-Z ]*$/", $inFirst)){
				$validForm = false;
				
				$firstNameErr = "Only letters and white spaces allowed";
			}
			else if($inFirst == ""){
				$firstNameErr = "Field can not be blank.";
			}
		}
		
		//validate last name entered
		//make sure field is not blank
		function validateLastName($inLast){
			global $validForm, $lastNameErr;
			$lastNameErr = "";
			
			if(!preg_match("/^[a-zA-Z ]*$/", $inLast)){
				$validForm = false;
				
				$lastNameErr = "Only letters and white spaces allowed";
			}
			else if($inLast == ""){
				$validForm = false;
				
				$lastNameErr = "Field can not be blank.";
			}
		}
		
		//validate whether a program is selected
		function validateProgram($inProgram){
			global $validForm, $programErr;
			$programErr = "";
			
			if($inProgram == "default"){
				$validForm = false;
				
				$programErr = "Please select a program.";
			}
		}
		
		//Not required, don't throw error if blank
		//validation address if entered
		function validateWebAddress($inAddress){
			global $validFrom, $websiteAddressErr;
			$websiteAddressErr = "";
			
			if($inAddress == ""){
				
			}
			
			else if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$inAddress)){
				$validFrom = false;
			
				$websiteAddressErr = "Please enter a valid URL address.";
			}
		}
		
		//Not required, don't throw error if blank
		//validate email if entered
		function validatePersonalEmail($inEmail){
			global $validForm, $emailErr;
			$emailErr = "";
			
			if($inEmail == ""){
				
			}
			else if(!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/",$inEmail)){
				$validForm = false;
				
				$emailErr = "Not a valid input.";
			}
		}
		
		
		//validate linkedin profile
		//requires preceding "linkedin.com/in/" to be considered valid
		function validateLinkedIn($inLinked){
			global $validFrom, $linkedInErr;
			$linkedInErr = "";
			
			if($inLinked == ""){
				
			}
			
			else if(!preg_match("/\b(?:www\.linkedin\.com\/in\/|https?:\/\/linkedin\.com\/in\/|https?:\/\/www\.linkedin\.com\/in\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$inLinked)){
				$validFrom = false;
			
				$linkedInErr = "Please enter a valid LinkedIn profile address.<br>Example: www.linkedin.com/in/MattM";
			}
		}
			
		
		//validate 2nd website address when web development 'program' is selected
		//Not required, validate if entered
		function validateAdditionalWeb($inAddress){
			global $validFrom, $websiteAddress2Err;
			$websiteAddress2Err = "";
			
			if($inAddress == ""){
				
			}
			else if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$inAddress)){
				$validFrom = false;
			
				$websiteAddress2Err = "Please enter a valid URL address.";
			}
		}
		
		
		//validate hometown field | only letters, numbers, spaces and commas allowed
		//required field
		function validateHometown($inHometown){
			global $validForm, $hometownErr;
			$hometownErr = "";
			
			if(!preg_match("/^[a-zA-Z 1-9,]*$/", $inHometown)){
				$validForm = false;
				
				$hometownErr = "Only letters, numbers, spaces and commas allowed";
			}
			else if($inHometown == ""){
				$validForm = false;
				
				$hometownErr = "Field can not be blank.";
			}
		}
		
		
		//validate career goals field | only allow letters, numbers, spaces and basic punctuation
		//required field
		function validateGoals($inGoals){
			global $validForm, $careerGoalsErr;
			$careerGoalsErr = "";
			
			if(!preg_match("/^[a-zA-Z 1-9,.']*$/", $inGoals)){
				$validForm = false;
				
				$careerGoalsErr = "Only letters, numbers, spaces and basic punctuation allowed";
			}
			else if($inGoals == ""){
				$validForm = false;
				
				$careerGoalsErr = "Field can not be blank.";
			}
		}
		
		
		//validate 3 word | only allow letters, numbers, spaces and basic punctuation
		//required field
		function validateThreeWords($inThreeWords){
			global $validForm, $threeWordsErr;
			$threeWordsErr = "";
			
			if(!preg_match("/^[a-zA-Z 1-9,.']*$/", $inThreeWords)){
				$validForm = false;
				
				$threeWordsErr = "Only letters, numbers, spaces and basic punctuation allowed";
			}
			else if($inThreeWords == ""){
				$validForm = false;
				
				$threeWordsErr = "Field can not be blank.";
			}
		}
		
		//End validation functions
		
			
		//Validate form data using functions
		
		$validForm = true;
		
		validateEmail($emailToLogin);
		validateFirstName($firstName);
		validateLastName($lastName);
		validateProgram($program);
		validateWebAddress($websiteAddress);
		validatePersonalEmail($email);
		validateLinkedIn($linkedIn);
		validateAdditionalWeb($websiteAddress2);
		validateHometown($hometown);
		validateGoals($careerGoals);
		validateThreeWords($threeWords);
		
		
		if($validForm)
		{
			echo "<script> alert('Submission Successful.') </script>";
			$message = "Submission Successful.";	
		}
		
		else
		{
			$message = "<h1 style='font-size: 20px; color: red'>Something went wrong!</h1>";
		}//ends check for valid form
		
	}	
	else{
		$message = "Please enter your information.";
		
	}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>DMACC Portfolio Day Bio Form</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <!-- css3-mediaqueries.js for IE less than 9 -->

<script src="css3-mediaqueries.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>

	
	
	
	$(document).ready(function(){
		
		
		if( $("select[name=program]	option:selected").val() == "webDevelopment")
		{
			$(".secondWeb").css("display", "inline");
		}
		else
		{
			$(".secondWeb").css("display", "none");
		}
		
		$("select#program").change(function(){
			if( $("select#program option:selected").val() == "webDevelopment")
			{
				$(".secondWeb").css("display", "inline");
			}
			else
			{
				$(".secondWeb").css("display", "none");
			}
		});
		
		function resetForm(){
			$("#firstName").val("");
			$("#lastName").val("");
			$("#program").val("default");
			$("#websiteAddress").val("");
			$("#websiteAddress2").val("");
			$("#email").val("");
			$("#hometown").val("");
			$("#careerGoals").val("");
			$("#threeWords").val("");
		}
	});
	
	
	</script>
  
  <style>
	img{
		display: block;
		margin: 0 auto;
	}
	.frame{
		background-image: url("orange popsicle.jpg");
		padding: 1em;	
	}
	.frame2{
		background-image: url("citrus.jpg");
		padding: 1.3em;	
	}	
	body{
		background-image: url("bodacious.png");
		margin: 1.5em;
	}
	
	.main {
		padding: 1em;
		background-color: white;
	}
	form{
		text-align: center;
	}
	h2 {
		text-align: center;
	}
	.robotic{
		display: none;
	}

	.form {
		background-color:white;
		padding-left: 5em;
	}
	p {
		align:left;
	}	
	.citrus{
		margin: auto;
		background-image: url("raspberry.jpg");
		padding: 1.3em;	
		width: 70%;
	}
	.bamboo{
		background-image: url("bamboo.jpg");
		padding: 1em;	
	}	
	.violet{
		background-image: url("ultra violet.png");
		padding: .5em;	
	}	
	.secondWeb{
		display: none;
	}
	table{
		margin: auto;
	}
	table td{
		padding-bottom: .75em;
	}
	.error{
		font-style: italic;
		color: #d42a58;
		font-weight: bold;
	}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  img {
    width:100%;
  }
  .form {
	width:100%; 
	padding-left: .1em;
	padding-top: .1em;
  }
  .citrus {
	background-image:none;  
  }
  .bamboo {
	background-image:none;  
  } 
  .violet {
	background-image:none;  
  }  
  .secondWeb{
		display: none;
	}  
  table{
		margin: auto;
	}
  table td{
		padding-bottom: .5em;
	}
}
	
  </style>
  
<!-- Input Field validations. 

validateFirstName
	// valid first name should only include letters, numbers, and spaces
	// ... must be present


validateLastName
	// valid last name should only include letters, numbers and spaces
	// ... must be present

validateProgram
	//valid program must not be default options

validateWebsiteAddress
	//valid URL format

validateWebsiteAddress2
	//valid URL format	

validateLinkedIn
	//valid URL to linkedin.com

validateEmail
	//valid email should be in a proper format  
	//Matches: bob@aol.com | bob@wrox.co.uk | bob@domain.info |123@123.123
	//Non-Matches: a@b | notanemail | bob@@.

validateHometown
	// valid name should only include letters, numbers, spaces, and commas
	// ... must be present

validateCareerGoals
	//valid career goals should include only numbers, letters, spaces, and basic punctuation

validateThreeWords
	//valid three-words should include only numbers, letters, spaces, and basic punctuation

-->
  
</head>

<section class="orange">
<body>
<div class="frame2">
<div class="frame">

  <div class="main">
  <div><img src="madonna.gif" alt="Mix gif" ></div>
  <br>

<!--<a href = 'dmaccPortfolioDayLogout.php'>Log Out</a>-->

<section class="citrus">
<section class="bamboo">
<section class="violet">

	<div class="main form">
	
	<h2></h2>
	</table>
	<form id="portfolioBioForm" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
		<h1 style="font-size: 20px;" ><?php echo $message ?></h1>
		<table>
		<tr>
		<td >Login Email:<br> <input type="text" id="emailToLogin" name="emailToLogin" value="<?php echo $emailToLogin ?>"/><br><span class="error" id="emailToLogin"><?php echo $emailToLoginErr ?></span></td>
		</tr>
		<tr>
		<td>First Name:<br> <input type="text" id="firstName" name="firstName" value="<?php echo $firstName ?>"/><br><span class="error" id="firstNameError"><?php echo $firstNameErr ?></span></td>
		</tr>
		<tr>
		<td>Last Name:<br> <input type="text" id="lastName" name="lastName" value="<?php echo $lastName ?>" /><br><span class="error" id="lastNameError"><?php echo $lastNameErr ?></span></td>
		</tr>
		<tr>
		<td >Program:<br> <select id="program" name="program">
				<option value="default"> ---Select Your Program---</option>
				<option value="animation" <?php if ($program == "animation") echo "selected"; ?>>Animation</option>
				<option value="graphicDesign" <?php if ($program == "graphicDesign") echo "selected"; ?>>Graphic Design</option>
				<option value="photography" <?php if ($program == "photography") echo "selected"; ?>>Photography</option>
				<option value="videoProduction" <?php if ($program == "videoProduction") echo "selected"; ?>>Video Production</option>
				<option value="webDevelopment"<?php if ($program == "webDevelopment") echo "selected"; ?>>Web Development</option>
			</select><br><span class="error" id="programError"><?php echo $programErr ?></span><td>
		</tr>
		<tr>
		<td >Secondary Program:<br> <select id="program2" name="program2">
				<option value="none" >---No Secondary Program---</option>
				<option value="animation" <?php if ($program2 == "animation") echo "selected"; ?>>Animation</option>
				<option value="graphicDesign" <?php if ($program2 == "graphicDesign") echo "selected"; ?>>Graphic Design</option>
				<option value="photography" <?php if ($program2== "photography") echo "selected"; ?>>Photography</option>
				<option value="videoProduction"  <?php if ($program2 == "videoProduction") echo "selected"; ?>>Video Production</option>
				<option value="webDevelopment" <?php if ($program2 == "webDevelopment") echo "selected"; ?>>Web Development</option>
			</select><br><span class="error" id="program2Error"><?php echo $program2Err ?></span><td>
		</tr>
		<tr>
		<td>Website Address:<br> <input type="text" id="websiteAddress" name="websiteAddress" value="<?php echo $websiteAddress ?>"/><br><span class="error" id="websiteAddressError"><?php echo $websiteAddressErr ?></span></td>
		</tr>
		<tr>
		<td>Personal Email:<br><input type="text" id="email" name="email" value="<?php echo $email ?>" /><br><span class="error" id="emailError"><?php echo $emailErr ?></span></td>
		</tr>
		<tr>
		<td>LinkedIn Profile:<br><input type="text" id="linkedIn" name="linkedIn" value="<?php echo $linkedIn ?>" /><br><span class="error" id="linkedInError"><?php echo $linkedInErr ?></span></td>
		<tr>
		<td><span class="secondWeb" style="display: block">Secondary Website Address (git repository, etc.):<br> <input type="text" id="websiteAddress2" name="websiteAddress2" value="<?php echo $websiteAddress2 ?>"/><br><span class="error" id="websiteAddress2Error"><?php echo $websiteAddress2Err ?></span></span></td>
		</tr>
		<tr>
		<td>Hometown:<br> <input type="text" id="hometown" name="hometown" value="<?php echo $hometown ?>"/><br><span class="error" id="hometownError"><?php echo $hometownErr ?></span></td>
		</tr>
		<tr>
		<td>Career Goals:<br> <textarea id="careerGoals" name="careerGoals" ><?php echo $careerGoals ?></textarea><br><span class="error" id="careerGoalsError"><?php echo $careerGoalsErr ?></span></td>
		</tr>
		<tr>
		<td>3 Words that Describe You:<br> <input type="text" id="threeWords" name="threeWords" value="<?php echo $threeWords ?>"/><br><span class="error" id="threeWordsError"><?php echo $threeWordsErr?></span></td>
		<p class="robotic" id="pot">
			<label>Leave Blank</label>
			<input type="hidden" name="inRobotest" id="inRobotest" class="inRobotest" />
		</p>
		<input type="hidden" id="submitConfirm" name="submitConfirm" value="submitConfirm"/>
		</tr>
		<tr>
		<td><input type="submit" id="submitBio" name="submitBio" value="Submit Bio" /></td>
		</tr>
		<tr>
		<td><input type="reset" id="resetBio" name="resetBio" onClick="resetForm()" value="Reset Bio"/></td>
		</tr>
		</table>
	</form>

	</div>
	

</section>	
</section>
</section>
  
</div>

</body>
</section>

</html>
