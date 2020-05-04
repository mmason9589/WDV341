<?php
	
	$productContainer = new stdClass();
	
	$productContainer->productName = "PHP Textbook";
	$productContainer->productPrice = "$129.95";
	$productContainer->productPageCount = "327";
	$productContainer->productISBN = "13-1234435690";
//
	$returnObj = json_encode($productContainer);	//create the JSON object
//	
	echo $returnObj;							//send results back to calling program
?>
