<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = $_GET['page'] ?? 0;
        $session = $_SESSION['login'];

        $catalog = Product::getLimit(($page + 1) * 5);
        echo $this->render('product/catalog',[
            'catalog' => $catalog,
            'page' => ++$page,
            'session' => $session
        ]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id);

        echo $this->render('product/card', [
            'product' => $product
        ]);
    }
}