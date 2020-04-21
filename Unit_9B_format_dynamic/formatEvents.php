<?php
	//assignment:
	//pull data from data base and format onto page
	//Get the Event data from the server.


	//assignment, what's left?
	//highlight the future dates
	//highlight dates in the current month
	//ALL using the $todaysDate var


	
	try {

		  require 'HeartL_PDO_connectionFile.php';	//CONNECT to the database

		  //mysql DATE stores data in a YYYY-MM-DD format
		  $todaysDate = date("Y-m-d");		//use today's date as the default input to the date( )
		
		 

		  //Create the SQL command string
		
		  $sql = "SELECT ";
		  $sql .= "event_name, ";
		  $sql .= "event_description, ";
		  $sql .= "event_presenter, ";
		  $sql .= "event_date, ";
		  $sql .= "DATE_FORMAT(event_date, '%Y-%m-%d') ";
		  $sql .= "AS event_date, ";
		  $sql .= "event_time ";
		  $sql .= "FROM wdv341_event ";
		  $sql .= "ORDER BY ";
		  $sql .= "event_date DESC, ";			//ORDER BY the date column in descending order
		  $sql .= "event_time DESC, ";
		  $sql .= "event_name DESC, ";
		  $sql .= "event_description DESC, ";
		  $sql .= "event_presenter DESC";
		
		
		  //$sql = "SELECT event_name, event_description, event_presenter, event_date, event_time FROM wdv341_event ORDER BY event_date";	
		
	

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
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;	
		}
		
		.displayEvent{
			text_align:left;
			font-size:18px;	
		}
		
		.displayDescription {
			margin-left:100px;
		}
		
		.appItalic{
			font-style: italic;
		}
		
		.appBoldRed{
			font-weight: bold;
			color: red;
		}
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>   
    <h3>??? Events are available today.</h3>
	<h1><?php echo $todaysDate; ?></h1>
	
	
	


	
<?php
	//Display each row as formatted output in the div below
	
	
	
	while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) 
	{
		
		
		
		
			
		if($row["event_date"] > $todaysDate){
			
			$row['event_name'] = '<span class="appItalic">' . $row["event_name"] . '</span>';
			
			
		}
		
		
		if(substr($row["event_date"],0,7) == substr($todaysDate,0,7)){
			
			
			$row['event_name'] = '<span class="appBoldRed">' . $row["event_name"] . '</span>';
			
			
		}
		
?>
	
	<p>
        <div class="eventBlock">	
            <div>
            	<span class="displayEvent">Event: <?php echo $row['event_name']; ?></span>
                <span>Presenter: <?php echo $row['event_presenter']; ?></span>
            </div>
            <div>
            	<span class="displayDescription">Description: <?php echo $row["event_description"]; ?></span>
            </div>
            <div>
            	<span class="displayTime">Time: <?php echo $row["event_time"]; ?></span>
            </div>
            <div>
            	<span class="displayDate">Date: <?php echo $row["event_date"]; ?></span>
            </div>
        </div>
    </p>

<?php
	//Close the database connection						   
	}
?>
	

</div>	
</body>
</html>