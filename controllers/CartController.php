<?php

namespace app\controllers;

use app\models\Cart;

class CartController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionShow()
    {
        $Cart = Cart::getOne($id);

        echo $this->render('cart');
    }
}