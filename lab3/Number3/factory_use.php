<?php

require_once 'UserFactoryInterface.php';
require_once 'UserFactory.php';
require_once 'UserInterface.php';
require_once 'User.php';

$users = require 'users.php';  // Подключаем файл users.php и получаем массив пользователей

foreach ($users as $user) {
    echo "Имя: " . $user->getName() . "<br>";
    echo "Роль: " . $user->getRole() . "<br>";
    echo "Email: " . $user->getEmail() . "<br>";
    echo "------------------------<br>";
}