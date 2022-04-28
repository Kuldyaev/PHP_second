<?php

namespace app\models;

use app\engine\Db;

class Cart extends DBModel
{
    public $id;
    public $cart_id;
    public $item_id;
    public $quantity;
    public $user;

    public function __construct($cart_id = null, $item_id = null, $quantity = null, $user = null)
    {
        $this->cart_id = $cart_id;
        $this->item_id = $item_id;
        $this->quantity = $quantity;
        $this->user = $user;
    }

    public static function getCartBySession($session_id) {
        $sql = "SELECT current_cart.id AS id, goods.name, current_cart.quantity, goods.price, goods.id AS good_id FROM current_cart, goods WHERE cart_id = :session_id AND goods.id = current_cart.item_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public static function addItemToCart($good_id, $session_id) {
        $sql = "INSERT INTO current_cart (item_id, quantity, cart_id) VALUES ( :good_id, 1, :session_id)";
        return Db::getInstance()->execute($sql, ['session_id' => $session_id, 'good_id' => $good_id]);
    }

    public static function isItemInCart($good_id, $session_id) {
        $sql = "SELECT current_cart.id AS id FROM current_cart WHERE cart_id = :session_id AND item_id = :good_id";
        $result = false;
        
        if (count(Db::getInstance()->queryAll($sql, ['session_id' => $session_id, 'good_id' => $good_id]))>0){
            $result = true;
        }
              
        return $result;
    }

    public static function getTableName()
    {
        return 'current_cart';
    }
}