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
        // return Database::getInstance()->queryOne($sql, ['id' => $id]);
        return Database::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Database::getInstance()->queryAll($sql);
    }

    protected abstract function getTableName();

    public function insert()
    {
        $myKeys = '';
        $myPlaceholders = '';
        $params = [];
        foreach ($this as $key => $value) {
            if ($key != 'id') {
                $myKeys = $myKeys . $key . ", ";
                $myPlaceholders =  $myPlaceholders . ":" .  $key . ", ";
                $params[$key] =  $value; 
            }
        }
        $myKeys = substr($myKeys,0,-2);
        $myPlaceholders = substr($myPlaceholders,0,-2);
        $tableName = $this->getTableName();
      
        $sql = "INSERT INTO {$tableName} ({$myKeys}) VALUES ({$myPlaceholders})";
        
        Database::getInstance()->execute($sql, $params);
        $this->id = Database::getInstance()->lastInsertId()["LAST_INSERT_ID()"];
        
        return $this;
    }

    public function delete()
    {
        $id = $this -> id;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Database::getInstance()->execute($sql, ['id'=>$id]);
    }

    public function rewrite($obj)
    {
        return $obj->name;
    }
}