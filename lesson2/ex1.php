<!DOCTYPE html>
<html>
<?php
	$title = "Задание1 Урок2";
	
	$a = mt_rand(0,400) - 200;
	$b = mt_rand(0,400) - 200;
?>	
<head>
	<title><?php echo $title ?></title>
	<meta charset="UTF-8">
</head>
<body>
<h1><?php echo $title ?></h1>
<br><br>
<?php 
	echo "a : " . $a . '<br>'; 
	echo "b : " . $b . '<br>'; 
	if ( $a < 0) {
		if ( $b < 0){
			echo "Both numbers are negative";
		} else {
			echo "a - negative, b - positive ";
		}
	} else {
		if ( $b < 0){
			echo "b - negative, a - positive ";
		} else {
			echo "Both numbers are positive";
		}

	}

?>
</body>
</html>

