<?php

class Autoload
{
    public function loadClass($className)
    {
        $fileName = str_replace( '\\', '/', str_replace('app\\', ROOT . DS, $className)) . ".php";
        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}