<?php
//   подключаем файл конфигурации
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
//   читаем адресную строку
$url_arr = explode('/', $_SERVER['REQUEST_URI']);


use app\models\{Product, User};
use app\engine\Render;

include  ROOT . "/engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



$product = new Product("Пицца","Описание", 125);



$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    die("Нет такого контроллера");
}

//$product = new Product();
//$user = new User();

//var_dump($product);
//var_dump(ROOT . "/engine/Autoload.php");

die();