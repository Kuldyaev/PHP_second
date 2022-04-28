<?php

namespace app\controllers;

use app\models\Product;
use app\engine\Request;
use app\engine\Session;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = (new Request())->getParams()['page'] ?? 0;

        $catalog = Product::getLimit(($page + 1) * 5);
        echo $this->render('product/catalog',[
            'catalog' => $catalog,
            'page' => ++$page,
            'session' => (new Session())->getId() 
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = Product::getOne($id);

        echo $this->render('product/card', [
            'product' => $product,
            'session' => (new Session())->getId() 
        ]);
    }
}