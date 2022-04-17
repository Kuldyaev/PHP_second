<?php

namespace app\models;

use app\engine\Database;

use app\interfaces\IModel;

abstract class Model implements IModel
{

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function getOne($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Database::getInstance()->queryOne($sql, ['id' => $id]);
       // return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Database::getInstance()->queryAll($sql);
    }

    protected abstract function getTableName();

    public function delete() {
        $id = $this->id;
        $sql = "DELETE...";
        return Database::getInstance()->execute($sql, ['id'=>$id]);
    }

}