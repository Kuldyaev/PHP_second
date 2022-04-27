<?php

namespace app\controllers;

use app\models\Product;
use app\models\User;

class UserController extends Controller
{
    public function actionLoginform()
    {
        $post = '';
        if(isset($_POST['login'])){
            $login = $_POST['login'];
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
        session_regenerate_id();
        session_destroy();
        header("Location: /");
        die();
    }
}