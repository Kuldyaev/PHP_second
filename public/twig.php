<?php
$loader = new \Twig\Loader\FilesystemLoader('../templates');
var_dump($loader);
$twig = new \Twig\Environment($loader);

echo $twig->render('index.twig', ['name' => 'Fabien']);