<?php
//   пути к папкам проекта
define("ROOT", dirname(__DIR__));
define ('TEMPLATES_DIR', ROOT . '/templates/');
define ('LAYOUTS_DIR', 'layouts/');
define ("IMG_SMALL", $_SERVER['DOCUMENT_ROOT'] . "/img/small/");
//    настройки базы данных
define('HOST', 'localhost');
define('USER', 'student');
define('PASS', '123456');
define('DB', 'gb');
//    подключаем файлы движка сайта
include ROOT . "/engine/functions.php";
include ROOT . "/engine/db.php";
include ROOT . "/models/catalog.php";
include ROOT . "/models/store.php";
include ROOT . "/models/feedback.php";
include ROOT . "/models/cart.php";
include ROOT . "/models/calc.php";
include ROOT . "/models/auth.php";
include ROOT . "/models/orders.php";