<!DOCTYPE html>
<html>
<?php
	$title = "Задание3 Урок2";
?>	
<head>
	<title><?php echo $title ?></title>
	<meta charset="UTF-8">
</head>
<body>
<h1><?php echo $title ?></h1>
<br><br>
<?php 
	function sum($x, $y){ return  $x + $y; };
	function dif($x, $y){ return  $x - $y; };
	function mul($x, $y){ return  $x * $y; };
	function div($x, $y){ if ($y !== 0){ return  $x / $y; }};
?>
</body>
</html>

