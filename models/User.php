<?php

namespace app\models;


class User extends Model
{
    public $id;
    public $login;
    public $pass;

    public function __construct($name = null, $lastname = null,
                        $email = null, $role  = null,
                        $password = null, $q_limit = null)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->hash = $hash;
    }

    protected function getTableName()
    {
        return 'users';
    }

}