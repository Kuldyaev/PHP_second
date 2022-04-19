<?php

namespace app\models;


class Role extends Model
{
    public $id;
    public $name;
    public $can_read;
    public $can_write;
    public $can_edit;

    public function __construct($id = null, $name = null,
                        $can_read = null, $can_write  = null,
                        $can_edit = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->can_read = $can_read;
        $this->can_write = $can_write;
        $this->can_edit = $can_edit;
    }

    protected function getTableName()
    {
        return 'roles';
    }

}