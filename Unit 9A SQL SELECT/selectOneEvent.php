<?php

try {
	  
	  require "PDO_connectionFile.php";	//CONNECT to the database
	  
	  //mysql DATE stores data in a YYYY-MM-DD format
	  $todaysDate = date("Y-m-d");		//use today's date as the default input to the date( )
	  
	  //Create the SQL command string
	  $sql = "SELECT ";
	  $sql .= "event_name, ";
	  $sql .= "event_description, ";
	  $sql .= "event_presenter, ";
	  $sql .= "event_date, ";
	  $sql .= "event_time, ";
	  $sql .= "FROM wdv341_event";
	  
	  $sql = "SELECT event_name, event_description, event_presenter, event_date, event_time FROM wdv341_event WHERE event_id='18'";	
		
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
<!doctype html>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 75%;
}

td, th  {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
	
tr:nth-child(even) {
  background-color: #dddddd;
}


</style>

<html>
<head>
<meta charset="UTF-8">
<title>Insert Events</title>
</head>

<body>


<h1>Form Page for Selected Events.</h1>
	
	<table>
		<tr>
			<th>Event Name</th>
			<th>Event Description</th>
			<th>Event Presenter</th>
			<th>Event Date</th>
			<th>Event Time</th>
		</tr>
	
	<?php 
			while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		?>		
		
				<tr>
					<!--Event Name Row -->
					
					<td>
						<span class="eventName"><?php  
				
							if($row['event_name'] == ""){
								echo "*No Input";
							}  
							else{   
								echo $row['event_name']; 
							}
							
							?></span>
					</td>
					
					<!--Event Description Row -->
					<td>
						<span class="eventDescription"><?php 
				
							
								echo $row['event_description']; 
							
						
						?></span>
					</td> 
					
					<!--Event Presenter Row -->
                    <td>
                        <span class="eventPresenter"><?php 
				
							if($row['event_presenter'] == ""){
								echo "*No Input";
							}
							else{
								echo $row['event_presenter']; 
							}
							
						?></span>
                   	</td>
					
					<!--Event Date Row -->
					<td>
                        <span class="eventDate"><?php 
				
							if($row['event_date'] == "0000-00-00"){
								echo "*No Input";
							}
							else{
								echo $row['event_date']; 
							}
							
						?></span>
                    </td>
					
					<!--Event Time Row -->
					<td>
                        <span class="eventTime"><?php 
				
							if($row['event_time'] == "00:00:00"){
								echo "*No Input";
							}
							else{
								echo $row['event_time']; 
							}
							
							?></span>
                    </td>
					
				</tr>		
				
		
			
		
        <?php
			}
		?>	
	
	</table>
	
</body>
</html>