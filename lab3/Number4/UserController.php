<?php

// UserController.php (Controller)
require_once 'User.php';

class UserController {
    private array $users;

    public function __construct(array $users) {
        $this->users = $users;
    }

    public function getUsers(): array {
        return $this->users;
    }
}