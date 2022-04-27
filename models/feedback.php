<?php

namespace app\models;


class Feedback extends Model
{
    public $id;
    public $goods_id;
    public $author;
    public $date;
    public $feedback;

    public function __construct($id = null, $goods_id = null,
                                $author = null, $date  = null,
                                $feedback = null)
    {
        $this->id = $id;
        $this->goods_id = $goods_id;
        $this->author = $author;
        $this->date = $date;
        $this->feedback = $feedback;
    }

    protected function getTableName()
    {
        return 'feedback';
    }

}