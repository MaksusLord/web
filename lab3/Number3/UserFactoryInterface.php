<?php

interface UserFactoryInterface {
    public function createUser(string $name, string $role, string $email): UserInterface;
}