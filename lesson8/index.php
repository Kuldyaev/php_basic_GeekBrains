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
//Запускаем сессию - отслеживание работы с сервером 
session_start();
// переключение страниц
$params = [];
$layout = 'layout';
$params['user'] = "guest";
$params['auth'] = false;
$params['is_admin'] = false;
if(is_auth()){
	$params['auth'] = true;
	$params['user'] = get_user();
}
if(is_admin()){
	$params['is_admin'] = true;
}

switch($page) {
	case 'index':
		$layout = 'layout';
		break;

	case 'catalog':
		if(isset($_GET['action']) ){
			if($_GET['action'] == 'delete'){
				$id = (int)$_GET['id'];
				deleteImageById($id);
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
		$cart =getCart(session_id());
		$amount = 0;
		foreach ($cart as $item)
			$amount += $item['price']*$item['quantity'];
		$params['cart'] = $cart;
		$params['amount'] = $amount;
		$params['positions'] = count($cart);
		$params['cartIsEmpty'] = (count($cart) === 0);
		break;

	case 'login':
		if (isset($_POST['send'])){
			$login = strip_tags($_POST['login']);
			$pass = strip_tags($_POST['pass']);
			if (!auth($login, $pass)){
				Die('Wrong login password');
			} else {
				if (isset($_POST['save'])){
					$hash = uniqid(rand(),true);
					$id = (int)$_SESSION['id'];
					addHashForUser($id, $hash);
					setcookie("hash", $hash, time() + 3600, '/');
				};
				header("Location:" . $_SERVER['HTTP_REFERER']);
			}
		}
		$layout = 'login';
		break; 

	case 'order':
		if(isset($_GET['action']) ){
			if($_GET['action'] == 'makeorder'){
				$user = (int)getUserId($_GET['user'])['id'];
				$sum = (int)$_GET['sum'];
				$items = (int)$_GET['items'];
				$hash = session_id();
				makeOrder($user, $sum, $items, $hash);
				header("Location: /orders");
				die();
			}
		}
		$layout = 'order';
		$cart =getCart(session_id());
		$amount = 0;
		foreach ($cart as $item)
			$amount += $item['price']*$item['quantity'];
		$params['cart'] = $cart;
		$params['amount'] = $amount;
		$params['positions'] = count($cart);
		$params['cartIsEmpty'] = (count($cart) === 0);
		break; 

	case 'orders':
		if(isset($_GET['action']) ){
			if($_GET['action'] == 'deleteorder' && $_SESSION['role'] == 1){
				$orderid = (int)$_GET['orderid'];
				deleteOrder($orderid);
				header("Location: /orders");
				die();
			}
		}
		$layout = 'orders';
		if($params['is_admin']){
			$orders = getOrders();
			$params['orders'] = $orders;
			$params['isListEmpty'] = (count($orders) === 0);
		} else {
			$orders = getUserOrders($params['user']);
			$params['orders'] = $orders;
			$params['isListEmpty'] = (count($orders) === 0);
		}
		if(!$params['auth']){
			header("Location: /login");
			die();
		}

		break; 

	default:
		if (isset($_GET['logout'])){
			setcookie("login", "", time()-36000, '/');
			setcookie("hash", "", time()-36000, '/');
			setcookie("role", "", time()-36000, '/');
			setcookie("pass", "", time()-36000, '/');
			session_destroy();
			header("Location: /");
		}
		echo "404";
		die();
}

echo render($page, $params, $layout);