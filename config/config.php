<?php
//   пути к папкам проекта
define("ROOT", dirname(__DIR__));
define("DS", DIRECTORY_SEPARATOR);
define("CONTROLLER_NAMESPACE", 'app\\controllers\\');
define("VIEWS_DIR", '../views/');

// константы с первого курса по PHP
define ('TEMPLATES_DIR', ROOT . '/templates/');
define ('LAYOUTS_DIR', 'layouts/');
define ("IMG_SMALL", $_SERVER['DOCUMENT_ROOT'] . "/img/small/");
//    настройки базы данных
define('HOST', 'course');
define('USER', 'student');
define('PASS', '123456');
define('DB', 'mybase');
//
