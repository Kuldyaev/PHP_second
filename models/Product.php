<?php
namespace app\models;


class Product extends DBModel
{
    public $id;
    public $name;
    public $s_description;
    public $f_description;
    public $price;
    public $quantity;
    public $q_limit;

    protected $props = [
        'name' => false,
        's_description' => false,
        'f_description' => false,
        'quantity' => false,
        'price' => false,
        'q_limit' => false
    ];


    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->s_description = $s_description;
        $this->f_description = $f_description;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->q_limit = $q_limit;
    }


    protected static function getTableName()
    {
        return 'goods';
    }
}