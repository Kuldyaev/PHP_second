<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Product;
use app\engine\Request;
use app\engine\Session;

class CartController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionShow()
    {
        $session = (new Session())->getId();

        echo $this->render('cart/show', [
            'session' => $session,
            'cart' => (new Cart())->getCartBySession($session)
        ]);
    }

    public function actionAdd()
    {
        $data = (new Request())->getParams();
        $result = "ok";

        if(!Cart::isItemInCart($data['operand1'], $data['operand2'])){
            Cart::addItemToCart($data['operand1'], $data['operand2']);
            $result = "add";
        };

        $responce['operand1'] = $data['operand1'];
        $responce['operand2'] = $data['operand2'];
        $responce['result'] = $result;
        $responce['operation'] = $data['operation'];
    
        echo json_encode($responce);
    }
}