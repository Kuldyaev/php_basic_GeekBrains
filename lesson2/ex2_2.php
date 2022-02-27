<!DOCTYPE html>
<html>
<?php
	$title = "Задание2_2 Урок2";
	$a = mt_rand(0,15);
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
	
	echo myLine($a);

	function myLine($i){
		if ($i < 16) {
			return $i . " " . myLine($i + 1);
		}
	}
?>
</body>
</html>

