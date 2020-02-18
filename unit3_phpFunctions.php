<?php

$stringInput = "   There are DMACC campuses all accross Iowa.    ";

$phoneNumber = 1234567890;

$currency = 123456;


function todaysDate()
{
	return date("n/d/Y");	
}


function todaysDateIntern()
{
	return date("d/n/Y");	
}


function stringNumCharac()
{
	global $stringInput;
	
	$stringInputUpdate = trim($stringInput);
	
	echo "Characters in String: " . strlen($stringInputUpdate);
	
	
	
	
}


function stringTrim()
{
	global $stringInput;
	
	$stringInputUpdate = trim($stringInput);
	
	$stringLower = strtolower($stringInputUpdate);
	
	echo "String Input trimmed and lowercase: " . $stringLower;
	
}


function stringIncludeDMACC()
{
	global $stringInput;
	
	$stringInputUpdate = trim($stringInput);
	
	$stringLower = strtolower($stringInputUpdate);
	
	$stringDMACC = strpos($stringLower, "dmacc");
	
	if(!$stringDMACC == "")
	{
		echo "True";
	}
	else
	{
		echo "False";
	}
	
	
}


function numberFormat()
{
	global $phoneNumber;
	
	$phoneNumberUpdate= substr_replace($phoneNumber, "-", 3, 0);
	echo substr_replace($phoneNumberUpdate, "-", 7, 0);
	

	
}


function formatCurrency()
{
	global $currency;
	
	$formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
	
	echo $formatter->formatCurrency($currency, 'USD');
	


}


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	
	<h1>Unit 3: PHP Functions</h1>
	
	<p>Date formatted to mm/dd/yyyy using php API date(): <?php echo todaysDate(); ?></p>
	
	<p>International date formatted to dd/mm/yyyy using php API date(): <?php echo todaysDateIntern(); ?></p>
	
	<br>
	
	<p><?php echo stringTrim(); ?></p>
	
	<p><?php echo stringNumCharac(); ?></p>
	
	<p>Does the string contain DMACC or dmacc? <?php echo stringIncludeDMACC() ?></p>
	
	<br>
	
	<p>Formatted Phone Number: <?php echo numberformat(); ?></p>
	
	<br>
	
	<p>Formatted currency: <?php echo formatCurrency() ?></p>
	
	
</body>
</html>