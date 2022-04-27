<?php

namespace app\engine;
use app\traits\TSingletone;

class Database
{   
    private $config = [
        'driver' => 'mysql',
        'host' => 'course',
        'login'=>'student',
        'password'=>'123456',
        'database'=>'mybase',
        'charset' => 'utf8',
    ];

    private $connection = null; //PDO

    use TSingletone;

    private function getConnection(){
        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    private function query($sql, $params) {
        $STH = $this->getConnection()->prepare($sql);
        $STH->execute($params);
        return $STH;
    }

    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function lastInsertId()
    {
        return $this->query("SELECT LAST_INSERT_ID()", $params = [])->fetch();
    }

    public function queryOneObject($sql, $params, $class)
    {
        $STH = $this->query($sql, $params);
        //TODO сделать чтобы конструктор вызывался до извлечения из БД
        $STH->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $STH->fetch();
    }
}