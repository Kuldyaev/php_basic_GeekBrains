<?php
//   подключаем файл конфигурации
include $_SERVER['DOCUMENT_ROOT'] . "/config/config.php";
//   читаем адресную строку
$url_arr = explode('/', $_SERVER['REQUEST_URI']);

if ( $url_arr[1] == ""){
	$page = 'index';
} else {
	$page = $url_arr[1];
}
// переключение страниц
$params = [];
$layout = 'layout';

switch($page) {
	case 'index':
		$layout = 'layout';
		break;
	case 'catalog':
		if(isset($_GET['action']) ){
			if($_GET['action'] == 'delete'){
				$id = (int)$_GET['id'];
				$result = executeSql("DELETE FROM imgs WHERE id = $id");
				header("Location: ../catalog");
				die();
			}
		}
		$layout = 'catalog';
		$params['catalog'] = getImgs();
		break;
	case 'oneimg':
		$id = (int)$_GET['id'];
		$params['img'] = getOneImg($id);
		$layout = 'oneimg';
		$result = executeSql("UPDATE imgs SET views = views + 1 WHERE id = $id");
		break;
	default:
		echo "404";
		die();
}

//var_dump(getDb());

echo render($page, $params, $layout);