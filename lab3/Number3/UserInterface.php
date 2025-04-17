<?php

interface UserInterface {
    public function getName(): string;
    public function getRole(): string;
    public function getEmail(): string; // Добавлено email
}