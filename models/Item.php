<?php

namespace app\models;

class Item extends Model
{
    public $id;
    public $name;
    public $s_description;
    public $f_description;
    public $price;
    public $quantity;
    public $q_limit;

    public function __construct($name = null, $s_description = null,
                        $f_description = null, $price  = null,
                        $quantity = null, $q_limit = null)
    {
        $this->name = $name;
        $this->s_description = $s_description;
        $this->price = $price;
        $this->f_description = $f_description;
        $this->quantity = $quantity;
        $this->q_limit = $q_limit;
    }


    protected function getTableName()
    {
        return 'goods';
    }
}