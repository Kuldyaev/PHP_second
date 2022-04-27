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
}