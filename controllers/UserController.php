<?php

namespace app\controllers;

use app\models\Product;
use app\models\User;
use app\engine\Request;
use app\engine\Session;


class UserController extends Controller
{
    public function actionLoginform()
    {
        $post = '';
        if(isset((new Request())->getParams()['login']) && isset((new Request())->getParams()['pass'])){
            $login = (new Request())->getParams()['login'];
            $pass = (new Request())->getParams()['pass'];
            if (User::Auth($login)) {
                header("Location: /");
                die();
            } else {
                die("Не верный логин пароль");
            }
        }

        $user = User::getName();
        $isAuth = User::isAuth();

        echo $this->render('user/loginform', [
            'user' => $user,
            'isAuth' => $isAuth,
            'post' => $post
        ]);
    }

    public function actionLogout()
    {
        $session = new Session();
        $session->regenerate();
        $session->destroy();
        header("Location: /");
        die();
    }
}