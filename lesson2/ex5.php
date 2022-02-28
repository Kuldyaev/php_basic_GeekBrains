<?php
$title = "Задание5 Урок2";
$text = "This is text: qwerewrweirupjwejflwejf;jflskajfowiejflwkjfewlijf";
$content = renderTemplate('context', $text,'', $title);
$menu = renderTemplate('menu');


echo renderTemplate('layout', $content, $menu, $title);
	
function renderTemplate($page, $content = '', $menu = '', $title = ''){
	ob_start();
	include $page . ".php";
	return ob_get_clean();
}
