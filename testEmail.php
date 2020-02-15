<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	
	<h1>Test Email</h1>
	
	<h3>WDV 341 Intro to PHP</h3>
	
	<?php
	
		require 'Emailer.php';			//access the class file
	
		$emailTest = new Emailer();		//instanatiate a new Emailer object
	
		$emailTest->setRecipientEmail('mmason@designdefined.org');
	
		$emailTest->setSubject("Test Subject");
	
		$emailTest->setMessage("This is a test message");
	
		//echo $emailTest->getSenderEmail();		//return email address
	
	
	
		echo $emailTest->sendEmail();	//send email to SMTP server
										//run function inside an object, "->"
	
		
		echo "<br><br>"."test";
	
	?>
	
	
	
	

	
</body>
</html>
