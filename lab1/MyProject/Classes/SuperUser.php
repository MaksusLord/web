<?php

namespace MyProject\Classes;

class SuperUser extends User implements SuperUserInterface {
    public $role;

    private static $superUserCount = 0; 

    public function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$superUserCount++; 
    }

    public function showInfo() {
        parent::showInfo();
        echo "Роль: " . $this->role . "<br>";
    }

    public function getInfo(): array {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'role' => $this->role,
        ];
    }

    public static function getSuperUserCount(): int {
        return self::$superUserCount;
    }
}
?>