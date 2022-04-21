<?php
namespace app\models;


class Feedback extends DBModel
{
    public $id;
    public $goods_id;
    public $author;
    public $date;
    public $feedback;

    protected $props = [
        'goods_id' => false,
        'author' => false,
        'date' => false,
        'feedback' => false
    ];


    public function __construct($name = null, $description = null, $price = null)
    {
        $this->goods_id = $goods_id;
        $this->author = $author;
        $this->date = $date;
        $this->feedback = $feedback;
    }


    protected static function getTableName()
    {
        return 'feedback';
    }
}