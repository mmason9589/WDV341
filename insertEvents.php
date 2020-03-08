<?php
//This php file will connect to the wdv341 database
//it will pull the form data from the $_POST variable
//it will format an INSERT SQL statement
//it will create a Prepared Statement 
//it will bind the parameters to the Prepared Statement
//it will execute the Prepared Statement to insert into the database
//it will display a success/failure message to the user

	require "heartlandConnectionFile/HeartL_PDO_connectionFile.php";		//access and run this external file



	if(isset($_POST["eventSubmit"])){

		

		$event_name = $_POST["eventName"];
		$event_description = $_POST["eventDescript"];
		$event_presenter = $_POST["eventPres"];
		$event_date = $_POST["eventDate"];
		$event_time = $_POST["eventTime"];
		$event_honey = $_POST["honeypot"];
		
		$message = "";
		//PDO Prepared Statements
		
		
		//if($validForm){
		
		
		try
		{


			//Honey pot exception
			//tested with actual field, and if blank, shows Warning and does not submit
			if($event_honey != ""){
					throw new PDOException;

				}
			

			//1. create the SQL statement with named placeholders (:eventName, ...)
			$sql = "INSERT INTO wdv341_event(event_name, event_description, event_presenter, event_date, event_time)
			VALUES (:eventName, :eventDescription, :eventPresenter, :eventDate, :eventTime)";

			//2. create the prepared statement object
			$stmt = $conn->prepare($sql);		//creates the prepared statement object

			//3. bind the parameters to the prepared statement object, one line for each parameter
			$stmt->bindParam(':eventName', $event_name);
			$stmt->bindParam(':eventDescription', $event_description);
			$stmt->bindParam(':eventPresenter', $event_presenter);
			$stmt->bindParam(':eventDate', $event_date);
			$stmt->bindParam(':eventTime', $event_time);

			//4. Execute the prepared statement object
			$stmt->execute();
			$message = "Sent Successfully";
		}

		catch(PDOException $e)
		{
			echo "<br>WARNING!";
		}

		$conn = null;	//close your connection object

		
	}
	else{
		$message = "Please enter your information.";
		
	}

		

?>
<!doctype html>


<script>
	
	function reset(){
		document.querySelector("#eventName").value = "";
		document.querySelector("#eventDescript").value = "";
		document.querySelector("#eventPres").value = "";
		document.querySelector("#eventDate").value = "";
		document.querySelector("#eventTime").value = "";
		
	}
	
</script>
<html>
<head>
<meta charset="UTF-8">
<title>Insert Events</title>
</head>

<body>
	
	<h1><?php echo $message; ?></h1>
	

<h1>Form Page for Events.</h1>
	
	<form name="form1" method="post" action="insertEvents.php">
	
	
		<p>
    		<label for="eventName">Event Name: </label>
    		<input type="text" name="eventName" id="eventName" value="" onClick="change()">
	  	
  		</p>
		
		<p>
    		<label for="eventDescript">Event Description: </label>
    		<input type="text" name="eventDescript" id="eventDescript" value="">
	  	
  		</p>
		
		<p>
    		<label for="eventPres">Event Presenter: </label>
    		<input type="text" name="eventPres" id="eventPres" value="">
	  	
  		</p>
		
		<p>
    		<label for="eventDate">Event Date: (YYYY-MM-DD) </label>
    		<input type="text" name="eventDate" id="eventDate" value="">
  		</p>
		
		<p>
    		<label for="eventTime">Event Time: (H:M) </label>
    		<input type="text" name="eventTime" id="eventTime" value="">
	  	
  		</p>
		
		<p style="display: none">
    		<label for="honeypot">Honeypot: </label>
    		<input type="text" name="honeypot" id="honeypot" value="">
	  	
  		</p>
	
		<p>
			<input type="submit" name="eventSubmit" id="eventSubmit" value="Submit">
    		<input type="reset" name="Reset" id="reset" value="Reset" onClick="reset()">
		</p>
		
		
		
	
	</form>
	
	
</body>
</html>