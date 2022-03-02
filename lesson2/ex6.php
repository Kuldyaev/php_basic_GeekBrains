<!DOCTYPE html>
<html>
<?php
	$a = 0;
	$title = "Задание6 Урок2";
?>	
<head>
	<title><?php echo $title ?></title>
	<meta charset="UTF-8">
</head>
<body>
<h1><?php echo $title ?></h1>
<br><br>
<?php 
	function power($val, $pow){
		if ($pow === 0) {
			return 1;
		} else if ( $pow > 0 ) {
			return $val * power($val, $pow - 1);  
		} else {
			$result = $val  * power($val, -$pow);  
			return "1/". $result;  
		}
	};

	echo power(2,-3);
?>
</body>
</html>

