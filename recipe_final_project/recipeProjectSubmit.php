
<!DOCTYPE html>
<?php
session_start();

require "PDO_connectionFile.php";

//create default variables
$validForm = "";
$recipeCreator = "";
$recipeName = "";
$recipeServ = "";
$recipeTime = "";
$recipeDiff = "";
$unitMeasureValue = "";
$unitOfMeasure = "";
$unitIngred = "";
$recipeInstruct = "";
$image = "";



//create error variables
$errRecipeCreator = "";
$errRecipeName = "";
$errRecipeServ = "";
$errRecipeTime = "";
$errRecipeDiff = "";
$errUnitMeasureValue = "";
$errUnitOfMeasure = "";
$errUnitIngred = "";
$errRecipeInstruct = "";
$errImage = "";



	if(isset($_POST["submitRec"])){
		
		$recipeCreator = $_POST["creatorName"];
		$recipeName = $_POST["custRecipeName"];
		$recipeServ = $_POST["custNumServ"];
		$recipeTime = $_POST["custTimeComp"];
		if(isset($_POST["diff"]))$recipeDiff = $_POST["diff"];
		$unitMeasureValue = $_POST["numVal"];
		$unitOfMeasure = $_POST["unit"];
		$unitIngred = $_POST["ingred"];
		$recipeInstruct = $_POST["instruct"];
		$image = $_FILES["custPic"]["name"];
		//path to store the uploaded image
		$target = "images/" . basename($_FILES["custPic"]["name"]);
		$message = "";
		$msg = "";
		
		
		//create sql statement
		$sql = "INSERT INTO recipe_data(recipe_creator, recipe_name, recipe_servings, recipe_time, recipe_difficulty, recipe_ingred_num, recipe_ingred_unit, recipe_ingred, recipe_instruct, recipe_photo)
			VALUES (:creatorName, :custRecipeName, :custNumServ, :custTimeComp, :diff, :numVal, :unit, :ingred, :instruct, '$image')";
		
		
		//form validation functions
		
		//validate creator field
		function validateName($inName){
			global $validForm, $errRecipeCreator;
			$errRecipeCreator = "";
			
			if(!preg_match("/^[a-zA-Z ]*$/", $inName)){
				$validForm = false;
				
				$errRecipeCreator = "<span class='errStyle' style='margin-left: 100px;'>Only letters and white spaces allowed</span>";
			}
			else if($inName == ""){
				$validForm = false;
				$errRecipeCreator = "<span class='errStyle' style='margin-left: 100px;'>Field can not be blank</span>";
			}
			
		}
		
		//validate recipe name field
		function validateRecipeName($inRecName){
			global $validForm, $errRecipeName;
			$errRecipeName = "";
			
			if(!preg_match("/^[a-zA-Z ]*$/", $inRecName)){
				$validForm = false;
				
				$errRecipeName = "<span class='errStyle' style='margin-left: 155px;'>Only letters and white spaces allowed</span>";
			}
			else if($inRecName == ""){
				$validForm = false;
				$errRecipeName = "<span class='errStyle' style='margin-left: 155px;'>Field can not be blank</span>";
			}
		}
		
		
		//validate number of servings
		//can only contain numbers
		function validateNumServ($inServ){
			global $validForm, $errRecipeServ;
			$errRecipeServ = "";
			
			if(!preg_match("/^[0-9]*$/", $inServ)){
				$validForm = false;
				
				$errRecipeServ = "<span class='errStyle' style='margin-left: 103px;'>Only numbers allowed</span>";
			}
			else if($inServ == ""){
				$validForm = false;
				$errRecipeServ = "<span class='errStyle' style='margin-left: 103px;'>Field can not be blank</span>";
			}
		}
		
		
		//validate Time to complete
		//only numbers
		function validateTime($inTime){
			global $validForm, $errRecipeTime;
			$errRecipeTime = "";
			
			if(!preg_match("/^[0-9]*$/", $inTime)){
				$validForm = false;
				
				$errRecipeTime = "<span class='errStyle' style='margin-left: 45px;'>Only numbers in minutes allowed</span>";
			}
			else if($inTime == ""){
				$validForm = false;
				$errRecipeTime = "<span class='errStyle' style='margin-left: 45px;'>Field can not be blank</span>";
			}
		}
		
		//validate whether a difficulty is selected
		function validateDiff($inDiff){
			global $validForm, $errRecipeDiff;
			$errRecipeDiff = "";
			
			if($inDiff == ""){
				$validForm = false;
				$errRecipeDiff = "<span class='errStyle' style='margin-left: 170px; margin-top:22px; position: absolute;'>Please select a difficulty</span>";
			}
		}
		
		//validate Ingredients number value
		//only numbers
	
		function validateNumVal($inNumVal){
			global $validForm, $errUnitMeasureValue;
			$errUnitMeasureValue = "";
			
			
			if(!preg_match("/^[0-9]*$/", $inNumVal[0])){
				$validForm = false;
				
				$errUnitMeasureValue = "<span class='errStyle' style='margin-left: 300px; margin-top:-3px; position: absolute;'>Only numbers allowed</span>";
			}
			else if($inNumVal[0] == ""){
				$validForm = false;
				$errUnitMeasureValue = "<span class='errStyle' style='margin-left: 317px; margin-top:-3px; position: absolute;'>Can not be blank</span>";
			}
			
		}
	
		
		//validate unit of measure
		//only letters allowed
		function validateMeasure($inMeasure){
			global $validForm, $errUnitOfMeasure;
			$errUnitOfMeasure = "";
			
			if(!preg_match("/^[a-zA-Z ]*$/", $inMeasure[0])){
				$validForm = false;
				
				$errUnitOfMeasure = "<span class='errStyle' style='margin-left: 443px; margin-top:-3px; position: absolute;'>Only letters allowed</span>";
			}
			else if($inMeasure[0] == ""){
				$validForm = false;
				$errUnitOfMeasure = "<span class='errStyle' style='margin-left: 450px; margin-top:-3px; position: absolute;'>Can not be blank</span>";
			}
		}
		
		//validate ingredient
		//only letters allowed
		function validateIngred($inIngred){
			global $validForm, $errUnitIngred;
			$errUnitIngred = "";
			
			if(!preg_match("/^[a-zA-Z ]*$/", $inIngred[0])){
				$validForm = false;
				
				$errUnitIngred = "<span class='errStyle' style='margin-left: 615px; margin-top:-3px; position: absolute;'>Only letters allowed</span>";
			}
			else if($inIngred[0] == ""){
				$validForm = false;
				$errUnitIngred = "<span class='errStyle' style='margin-left: 622px; margin-top:-3px; position: absolute;'>Can not be blank</span>";
			}
		}
		
		//validate Instructions
		//only letters, numbers, spaces and commas allowed
		
		function validateInstruct($inInstruct){
			global $validForm, $errRecipeInstruct;
			$errRecipeInstruct = "";
			
			if(!preg_match("/^[a-zA-Z 1-9,.]*$/", $inInstruct[0])){
				$validForm = false;
				
				$errRecipeInstruct = "<span class='errStyle' style='margin-left: 130px; margin-top:20px; position: absolute;'>Only letters, numbers, spaces and commas allowed</span>";
			}
			else if($inInstruct[0] == ""){
				$validForm = false;
				$errRecipeInstruct = "<span class='errStyle' style='margin-left: 130px; margin-top:20px; position: absolute;'>Field can not be blank</span>";
			}
		}
		
		
		//validate photo submission
		
		function validatePhoto($inPhoto){
			global $validForm, $errImage;
			$errImage = "";
			$check = getimagesize($_FILES["custPic"]["tmp_name"]);
			//$imageFileType = $inPhoto.split('.').pop();

				if($check !== false) {
					//success
				} 
				elseif($_FILES['custPic']['tmp_name'] > 500000){
					$errImage = "<span class='errStyle' style='margin-left: 130px; margin-top:20px; position: absolute;'>Your photo is too large</span>";
					$validForm = false;
				}
				elseif($check == ""){
					$errImage = "<span class='errStyle' style='margin-left: 20px; margin-top:8px; position: absolute;'>Please submit a photo</span>";
					$validForm = false;
				}
				
		}
		
		
		$validForm = true;
		
		//call functions to validate
		
		
		validateName($recipeCreator);
		validateRecipeName($recipeName);
		validateNumServ($recipeServ);
		validateTime($recipeTime);
		validateDiff($recipeDiff);
		validateNumVal($unitMeasureValue);
		validateMeasure($unitOfMeasure);
		validateIngred($unitIngred);
		validateInstruct($recipeInstruct);
		validatePhoto($image);
		
		
		
		
		
		
		if($validForm)
		{
			echo "<script> alert('Submission Successful.') </script>";
			$message = "Submission Successful.";	
			
			$stmt = $conn->prepare($sql);
		
			//$unitArray = implode(",,", $unitOfMeasure);
		
			//Creating variable to convert array to JSON
			$unitMeasureValArray = json_encode($unitMeasureValue, JSON_FORCE_OBJECT);
			$unitMeasureArray = json_encode($unitOfMeasure, JSON_FORCE_OBJECT);
			$unitIngredArray = json_encode($unitIngred, JSON_FORCE_OBJECT);
			$instructArray = json_encode($recipeInstruct, JSON_FORCE_OBJECT);

			//binding all Parameters
			$stmt->bindParam(':creatorName', $recipeCreator);
			$stmt->bindParam(':custRecipeName', $recipeName);
			$stmt->bindParam(':custNumServ', $recipeServ);
			$stmt->bindParam(':custTimeComp', $recipeTime);
			$stmt->bindParam(':diff', $recipeDiff);
			$stmt->bindParam(':numVal', $unitMeasureValArray);
			$stmt->bindParam(':unit', $unitMeasureArray);
			$stmt->bindParam(':ingred', $unitIngredArray);
			$stmt->bindParam(':instruct', $instructArray);
			
			if(move_uploaded_file($_FILES['custPic']['tmp_name'], $target)){
				$msg = "success";
			}else{
				$msg = "error";
			}

			$stmt->execute();
		}
		
		else
		{
			$message = "<h1 style='font-size: 20px; color: red'>Something went wrong!</h1>";
		}//ends check for valid form
		
	}	
	else
	{
		$message = "";
		
	}

?>

<html>

<link rel="stylesheet" type="text/css" href="recipe.css">
<link rel="stylesheet" type="text/css" href="submit.css">
	
<script src="recipe.js"></script>
	
<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed&display=swap" rel="stylesheet">
	
<head>

<title>Recipe Project</title>
	
<script src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">	
</script>
	

	
<script>

	//variables row incrementing and decrementing when adding and deleting rows (ingredients and instructions)
	var i = 1;
	var p = 1;
	
	var rowIngredIncrem = 2
	var rowInstructIncrem = 2;
	var instructNum = 2
	
	//adds an additional line for ingredients input
	//on click
	function addCustIngred(){
		
		var table = document.getElementById("ingredTab");
		var row = table.insertRow(rowIngredIncrem);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		
		cell2.innerHTML = '<input style="width: 20px" type="text" id="numVal" name=numVal[]/>';
		cell3.innerHTML = '<input style="width: 40px" type="text" id="unit" name="unit[]"/>';
		cell4.innerHTML = '<input style="width: 100px" type="text" id="ingred" name="ingred[]"/>';
		
		rowIngredIncrem++;
		i++;
	}
	
	//deletes last added line of ingredients
	//on click
	function deleteCustIngred(){
		if(i == 1){
			return;
		}else{
			document.getElementById("ingredTab").deleteRow(i);
			
			//decrement ALL when deleting a row
			rowIngredIncrem--;
			i--;
		}
	}
	
	//adds an additional line for instructions input
	//on click
	function addCustInstruct(){
		
		var table = document.getElementById("instructTab");
		var row = table.insertRow(rowInstructIncrem);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		
		cell2.innerHTML = instructNum + "."; 
		cell3.innerHTML = '<input style="width: 90%; margin-left: 0px" type="text" id="instruct" name="instruct[]"/>';
		
		rowInstructIncrem++;
		p++;
		instructNum++;
		
	}
	
	//deletes last added line of instructions
	//on click
	function deleteCustInstruct(){
		if(p == 1){
			return;
		}else{
			document.getElementById("instructTab").deleteRow(p);
			
			
			//decrement ALL when deleting a row
			p--;
			rowInstructIncrem--;
			instructNum--;
		}
		
	}
	
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
	<li><a href="recipeProjectSubmit.php"  style="color: #000000">Submit Recipe</a></li>
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

	<div id="recTitle">
		<p>Submit Your Recipe</p><?php echo $message;?>
	</div>
	
	<div id="containerSubmit">
	
		<form method="post" name="submitForm" action="recipeProjectSubmit.php" enctype="multipart/form-data">
			
				<p>Creator (Your Name): <?php echo $errRecipeCreator ?><input style="margin-bottom: 10px;" type="text" id="creatorName" name="creatorName" value="<?php echo $recipeCreator ?>" /><br></p>
		<hr class="subHr">
				<p>Recipe Name: <?php echo $errRecipeName ?><input style="margin-bottom: 10px;" type="text" id="custRecipeName" name="custRecipeName" value="<?php echo $recipeName ?>"/><br></p>
		<hr class="subHr">
				<p>Number of Servings: <?php echo $errRecipeServ ?><input style="margin-bottom: 10px;" type="text" id="custNumServ" name="custNumServ" value="<?php echo $recipeServ ?>"/><br></p>
		<hr class="subHr">
				<p>Time to Complete: <span style="font-size: 18px; color: #A0A0A0;">&nbsp In Minutes</span> <?php echo $errRecipeTime ?> <input style="margin-bottom: 10px;" type="text" id="custTimeComp" name="custTimeComp" value="<?php echo $recipeTime ?>"/><br></p>
		<hr class="subHr">
					<?php echo $errRecipeDiff ?>
					<p>Level of Difficulty: 
						<span id="radioDiff">
							Beginner<input style="margin-right: 45px" type="radio" id="Beginner" name="diff" value="Beginner" <?php if($recipeDiff == "Beginner") echo "checked" ?> />
							Intermediate<input style="margin-right: 45px" type="radio" id="Intermediate" name="diff" value="Intermediate" <?php if($recipeDiff == "Intermediate") echo "checked" ?>/>
							Advanced<input style="margin-right: 55px" type="radio" id="Advanced" name="diff" value="Advanced" <?php if($recipeDiff == "Advanced") echo "checked" ?>/><br>
						</span> 
					</p>
		<hr class="subHr">
				<table id="ingredTab">
					<tr><?php echo $errUnitMeasureValue ?><?php echo $errUnitOfMeasure ?><?php echo $errUnitIngred ?>
						<th style="font-size: 24px; padding-right: 190px; padding-left: 10px">Ingredients:</th>
						<th>Number Value:</th> 
						<th>Unit of measure:</th>
						<th>Ingredient</th>
					</tr>
					<tr>
						<td>
							<input type="button" style="margin-right: 25px; font-size: 15px" onClick="addCustIngred()" value="Add"/>
							<input type="button" style="margin-right: 25px; font-size: 15px" onClick="deleteCustIngred()" value="Delete"/>
						</td>
						<td><input style="width: 20px" type="text" id="numVal" name="numVal[]" value=""/></td>
						<td><input style="width: 40px" type="text" id="unit" name="unit[]" value="<?php //echo $unitOfMeasure ?>"/></td>
						<td><input style="width: 100px" type="text" id="ingred" name="ingred[]" value="<?php //echo $unitIngred ?>"/><br></td>
					</tr>
						<span id="addCustIngred"></span>
						
					
				</table>
		<hr class="subHr">
				<table id="instructTab">
					<tr>
						<th style="font-size: 24px; padding-right: 140px; padding-left: 10px">Instructions: </th><?php echo $errRecipeInstruct ?>
						<th></th>
						<th style="width: 80%"></th>
						
					</tr>
					<tr>
						<td>
							<input type="button" style="margin-right: 25px;margin-left: 20px; font-size: 15px; margin" onClick="addCustInstruct()" value="Add"/>
							<input type="button" style="font-size: 15px" onClick="deleteCustInstruct()" value="Delete"/>
						</td>
						<td>1.</td>
						<td><input style="width: 90%; margin-left: 0px" type="text" id="custInstruct" name="instruct[]" value=""/></td>
						
					</tr>
				</table>
		<hr class="subHr">
			
				<p>Submit a Photo: <?php echo $errImage?><input style="font-size: 17px; margin-left: 257px;" type="file" id="custPic" name="custPic" value="Choose a Picture"/><br></p>
			
		<hr class="subHr">
			
				<p>	<input id="submitSub" type="submit" name="submitRec" value="Submit">
					<input id="submitRes" type="submit" name="resetRec" value="Reset">
				</p>
			
			
		</form>
	</div>
	
	
	
<a href="#top"><p align="center" style="margin-bottom: 60px; margin-top: 60px">Back to Top</p></a>	
</body>
</html>