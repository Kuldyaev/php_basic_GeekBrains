<!DOCTYPE html>
<html>
<?php
	$a = 0;
	$title = "Задание4 Урок2";
?>	
<head>
	<title><?php echo $title ?></title>
	<meta charset="UTF-8">
</head>
<body>
<h1><?php echo $title ?></h1>
<br><br>
<?php 
	function mathOperation($arg1, $arg2, $operation){
		switch ($operation){
			case "sum":
				return  $arg1 + $arg2;
				break;
			case "dif":
				return  $arg1 - $arg2;
				break;
			case "mul":
				return  $arg1 * $arg2;
				break;
			case "div":
				if ($arg2 !== 0){
					 return  $arg1 / $arg2; 
				} else {
					return "Error";
				};
				break;
			default:
				return "Error";
		}
	};

	echo mathOperation(2,78, "sum"); //example, test

	function sum($x, $y){ return  $x + $y; };
	function dif($x, $y){ return  $x - $y; };
	function mul($x, $y){ return  $x * $y; };
	function div($x, $y){ if ($y !== 0){ return  $x / $y; }};
?>
</body>
</html>

