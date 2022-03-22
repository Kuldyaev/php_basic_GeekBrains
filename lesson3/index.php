<?php
$title = "Урок3";

echo '<p><b>Задание 3.1.1</b></p>';

$i=3;
while ($i<100) {
	echo $i . " ";
	$i += 3;
}

echo '<p><b>Задание 3.1.2</b></p>';

$i=0;
while ($i<=100) {
 	if ( !($i%3) ) {
		echo $i . " ";
	};
	$i++;
}

echo '<p><b>Задание 3.2.1</b></p>';

$i=0;
$myNumber = "";
do {
	if ( $i === 0){
		$myNumber = " - ноль.";
	} else if ( $i % 2) {
		$myNumber = " - нечетное число.";
	} else {
		$myNumber = " - четное число.";
	};

	echo $i . $myNumber . "<br>";
	$i++;
} while ( $i <= 10);

echo '<p><b>Задание 3.2.2</b></p>';

$i=0;
$myNumber = "";
do {
	if ( $i === 0){
		$myNumber = " - ноль";
	} else if ( $i & 1) {
		$myNumber = " - нечетное число";
	} else {
		$myNumber = " - четное число";
	};

	echo $i . $myNumber . "<br>";
	$i++;
} while ( $i <= 10);


echo '<p><b>Задание 3.3</b></p>';

$arr = [
	'Московская область' => [
		'Москва', 'Зеленоград', 'Клин'
	],
	'Ленинградская область' => [
		'Санкт-Петербург', 'Всеволжск', 'Павловск', 'Кронштадт'
	],
	'Рязанская область' => [
		'Рязань', 'Касимов', 'Скопин', 'Ряжск'
	],
	'Нижегородская область' => [
		 'Нижний Новгород', 'Арзамас', 'Дзержинск', 'Кстово'
	],
	'Владимирская область' => [
		'Владимир', 'Ковров', 'Муром', 'Александров', 'Гусь-Хрустальный'
	]
];

function cities($arr){
	$result = "";
	foreach ($arr as $region => $cities){
		$result .= $region . ':<br>';
		foreach ($cities as $index => $city){
			$point = ", ";
			if ( ($index + 1) == count($cities) ) { 
				$point = ".<br>";
			};
			$result .= $city . $point;
		};
	}
	return $result;
};

print cities($arr);

echo '<p><b>Задание 3.4</b></p>';

$arr = [
	'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
	'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k',
	'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
	'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts',
	'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ь' => "'", 'ы' => 'y', 'ъ' => "'", 
	'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];

function translate($str, $arr){
	$result = '';
	foreach (mb_str_split($str) as $symbol){
		$isCapital = false;
		if ($symbol === mb_strtolower($symbol, 'UTF-8')){ 
			if (array_key_exists($symbol, $arr)){
				$symbol = $arr[$symbol];
			}
		} else {
			if (array_key_exists(mb_strtolower($symbol, 'UTF-8'), $arr)){
				$symbol = mb_strtoupper($arr[mb_strtolower($symbol, 'UTF-8')], 'UTF-8');
			}	
		};
		$result .= $symbol;
	}
	return $result;
};

print translate('Молодой моряк и его  подружка!', $arr);

echo '<p><b>Задание 3.5</b></p>';

function replaceSpace($str){
	return str_replace(" ", "_", $str);
}

print replaceSpace("Москва - столица нашей родины ");

echo '<p><b>Задание 3.6</b></p>';

$menu = [
	'home' => 'home',
	'main' => 'main',
	'about' => 'about',
	'contacts' => 'contacts'
];

function renderMenu($menu){
	$result = '<nav><ul>';
	foreach($menu as $menuKey => $menuItem){
		$result .= '<li><a href="/' .  $menuItem  . '">' . $menuKey . '&nbsp</a></li>';
	}
	$result .= '</ul></nav>';
	return $result;
};

print renderMenu($menu);

echo '<p><b>Задание 3.7</b></p>';

for ($y=0; $y < 10; print $y++ ){};

echo '<p><b>Задание 3.8</b></p>';

$arr = [
	'Московская область' => [
		'Москва', 'Зеленоград', 'Клин'
	],
	'Ленинградская область' => [
		'Санкт-Петербург', 'Всеволжск', 'Павловск', 'Кронштадт'
	],
	'Рязанская область' => [
		'Рязань', 'Касимов', 'Скопин', 'Ряжск'
	],
	'Нижегородская область' => [
		 'Нижний Новгород', 'Арзамас', 'Дзержинск', 'Кстово'
	],
	'Владимирская область' => [
		'Владимир', 'Ковров', 'Муром', 'Александров', 'Гусь-Хрустальный'
	]
];

function cities2($arr){
	$result = "";
	foreach ($arr as $region => $cities){
		$result .= $region . ':<br>';
		foreach ($cities as $index => $city){
			if (mb_substr($city,0,1) == "К"){
				$result .= $city . ",";
			}
		};
		$result = mb_substr($result, 0, -1) . ".<br>";
	}
	return $result;
};

print cities2($arr);

echo '<p><b>Задание 3.9</b></p>';

function twoFunction($str){
	$arr = [
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
		'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k',
		'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
		'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ь' => "'", 'ы' => 'y', 'ъ' => "'", 
		'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
	];

	return replaceSpace(translate($str, $arr));
}

print twoFunction("Зима нечаянно нагрянет, когда ее совсем не ждешь");