<?php

namespace app\models;

use app\engine\Session;

class User extends DBModel
{
    public $id;
    public $name;
    public $lastname;
    public $email;
    public $role;
    public $password;
    public $hash;

    protected $props = [
        'name' => false,
        'password' => false
    ];


    public function __construct($name = null, $lastname  = null, $email = null, $role = null, $password = null, $hash = null)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->hash = $hash;
    }

    public static function Auth($login) {
        (new Session())->set('login',  $login);
        return true;
     }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function getName() {
        return (new Session())->get('login');
    }

    protected static function getTableName()
    {
        return 'users';
    }
}