<?php

class UserFactory implements UserFactoryInterface {
    public function createUser(string $name, string $role, string $email): UserInterface {
        return new User($name, $role, $email);
    }
}