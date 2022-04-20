<?php

namespace app\controllers;

use app\engine\Render;
use app\interfaces\IRender;

class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $render;


    public function __construct(IRender $render)
    {
        $this->render = $render;
    }


    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('404 нет такого экшена');
        }
    }

    public function render($template, $params = [])
    {
        return $this->renderTemplate('layouts/main', [
            'header' => $this->renderTemplate('header', $params),
            'menu' => $this->renderTemplate('menu', $params),
            'content' => $this->renderTemplate($template, $params),
            'footer' => $this->renderTemplate('footer', $params)
        ]);

    }


    public function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}