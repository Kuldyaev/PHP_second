<?php

namespace app\models;

class Order
{
    public $id;
    public $user;
    public $items;
    public $amount;
    public $open_date;
    public $close_date;
    public $status;


    public function __construct($id = null, $user = null,
                                $items = null, $amount  = null,
                                $open_date = null, $close_date = null,
                                $status = null)
    {
        $this->id = $id;
        $this->user = $user;
        $this->items = $items;
        $this->amount = $amount;
        $this->open_date = $open_date;
        $this->close_date = $close_date;
        $this->status = $status;
    }


    protected function getTableName()
    {
        return 'orders';
    }

}