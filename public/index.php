<?php
//   подключаем файл конфигурации
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] ."/../engine/Autoload.php";

use app\models\{Product, User, Item, Order};
use app\engine\Database;

spl_autoload_register([new Autoload(), 'loadClass']);


$item = new Product("Nata","wife", 216531);
$item2 = new Product("Slava", "husband", 0);

var_dump($item->rewrite($item2));


$user = new User();
$order = new Order();

//var_dump($product);





die();









