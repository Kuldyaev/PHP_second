<?php
session_start();
//   подключаем файл конфигурации
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
//   читаем адресную строку
$url_arr = explode('/', $_SERVER['REQUEST_URI']);

use app\engine\Autoload;
use app\models\{Product, User, Cart};
use app\engine\Render;
use app\engine\TwigRender;
use app\engine\Request;
// запускаем автозагрузчики
include  ROOT . "/engine/Autoload.php";
require_once ROOT . '/vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    die("Нет такого контроллера");
}

die();