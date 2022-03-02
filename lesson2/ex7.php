<!DOCTYPE html>
<html>
<?php
	$a = 0;
	$title = "Задание7 Урок2";
?>	
<head>
	<title><?php echo $title ?></title>
	<meta charset="UTF-8">
</head>
<body>
<h1><?php echo $title ?></h1>
<br><br>
<?php 
	function myTime($hh, $mm){
		$hhName = "час";
		$mmName = "минут";
		if ($hh === 0 || (5 <= $hh  && $hh < 20 )) {
			$hhName = "часов";
		} else if ((2 <= $hh && $hh <= 4) || (22 <= $hh && $hh <= 24 )){
			$hhName = "часа";
		}
		if ($mm === 1 || $mm === 21 || $mm === 31 || $mm === 41 || $mm === 51) {
			$mmName = "минута";
		} else if ((2 <= $mm && $mm <= 4) || (22 <= $mm && $mm <= 24 )
					|| (32 <= $mm && $mm <= 34 ) || (42 <= $mm && $mm <= 44 )
					|| (52 <= $mm && $mm <= 54 )){
			$mmName = "минуты";
		}
		return $hh . " " . $hhName . " " . $mm . " " . $mmName;
	};
?>
<br>
<?php echo myTime(22,15); ?>
<br>
<?php echo myTime(21,43); ?>
</body>
</html>

