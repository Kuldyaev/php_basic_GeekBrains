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
				$result = deleteImageById($id);
				header("Location: /catalog");
				die();
			}
		}
		$layout = 'catalog';
		$params['catalog'] = getImgs();
		break;
	case 'oneimg':
		$id = (int)$_GET['id'];
		$result = addViewsToImage($id);
		$img = getOneImg($id);
		$params['way'] = $img['way'];
		$params['views'] = $img['views'];
		$layout = 'oneimg';
		break;
	case 'store':
		$layout = 'store';
		$params['goods'] = getGoods();
		break;
	case 'item':
		$id = (int)$_GET['id'];
		$params['item'] = getOneGoodsCard($id);
		$params['feedback'] = getGFeedback($id);
		$layout = 'item';
		break;
	case 'calc1':
	case 'calc2':	
		$layout = 'calc';
		break;
	case 'calc':
		$data = json_decode(file_get_contents("php://input"));
		$params['oper1'] = $data->operand1;
		$params['oper2'] = $data->operand2;
		$params['operation'] = $data->operation;
		$layout = "post";
		break;
	case 'cart':
		$layout = 'cart';
		$cart =getCart(1);
		$amount = 0;
		foreach ($cart as $item)
			$amount += $item['price']*$item['quantity'];
		$params['cart'] = $cart;
		$params['amount'] = $amount;
		$params['positions'] = count($cart);
		$params['cartIsEmpty'] = (count($cart) === 0)?true:false;
		break;
	case 'login':
		$layout = 'login';
		$params['login'] = "myAUTH";
		break; 
	case 'order':
		$layout = 'order';
		break; 
	default:
		echo "404";
		die();
}

echo render($page, $params, $layout);