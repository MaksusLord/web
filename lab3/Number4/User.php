<?php

// User.php (Model)
class User {
    private string $name;
    private string $role;
    private string $email;

    public function __construct(string $name, string $role, string $email) {
        $this->name = $name;
        $this->role = $role;
        $this->email = $email;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function getEmail(): string {
        return $this->email;
    }
}