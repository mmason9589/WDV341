<?php

	$yourName = "Matt Mason";
	$number1 = 2;
	$number2 = 13;
	$total = $number1 + $number2;

	$jsArray = array("PHP", "HTML", "Javascript");


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP Basics</title>
	
<script>
	

</script>	

</head>

<body>
	
	<?php echo "<h1>PHP Basics</h1>" ?>
	
	
	<h2> <?php echo $yourName; ?> </h2>
	
	<p>
	
		Number 1 = <?php echo $number1; ?><br>
		Number 2 = <?php echo $number2; ?><br>
		Number 1 + Number 2 = <?php echo $total; ?>
	
	</p>
	
	<p>
	
	<?php print_r($jsArray); ?>
	
	<br>
	<br>
	
	<?php 
	
		foreach($jsArray as $value){
  		echo $value . "<br>";}
	
	?>
		
	</p>
	
</body>
</html>