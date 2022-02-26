<?php
	$a = 2;
	$b = 3;
	echo "start a" . $a . '<br/>';
	echo "start b" . $b . '<br/>';
	$b += $a;
	$a = $b - $a;
	$b = $b - $a;
	echo "end a" . $a . '<br/>';
	echo "end b" . $b;

?>

