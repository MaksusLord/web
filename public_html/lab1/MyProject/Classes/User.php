<?php

namespace MyProject\Classes;

require_once 'AbstractUser.php';

class User extends AbstractUser {
    public $name;
    public $login;
    private $password;

    private static $userCount = 0;

    public function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        if (get_class($this) === __CLASS__) {
            self::incrementUserCount(); 
        }
    }

    public function showInfo() {
        echo "Имя: " . $this->name . " ";
        echo "Логин: " . $this->login . " ";
        echo "Пароль: " . $this->password . "<br>";
    }


    public function __destruct() {
        echo "Пользователь [" . $this->login . "] удален.<br>";
    }

    public static function getUserCount(): int {
        return self::$userCount;
    }

    protected static function incrementUserCount() {
        self::$userCount++;  
    }
}
?>