<?php

require_once 'UserFactoryInterface.php';
require_once 'UserFactory.php';
require_once 'UserInterface.php';
require_once 'User.php';

$userFactory = new UserFactory();

$users = [
    $userFactory->createUser('Иван Иванов', 'Администратор', 'ivan@example.com'),
    $userFactory->createUser('Петр Петров', 'Пользователь', 'petr@example.com'),
    $userFactory->createUser('Анна Сидорова', 'Менеджер', 'anna@example.com'),
    $userFactory->createUser('Елена Смирнова', 'Редактор', 'elena@example.com'),
    $userFactory->createUser('Дмитрий Кузнецов', 'Гость', 'dmitry@example.com'),
];

return $users; // Возвращаем массив пользователей