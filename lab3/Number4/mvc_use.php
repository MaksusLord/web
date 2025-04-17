<?php

// mvc_use.php (Main File - MVC Execution)
require_once 'User.php';
require_once 'UserController.php';
require_once 'MarkdownView.php';

// 1. Model (Data)
$users = [
    new User('Иван Иванов', 'Администратор', 'ivan@example.com'),
    new User('Петр Петров', 'Пользователь', 'petr@example.com'),
    new User('Анна Сидорова', 'Менеджер', 'anna@example.com'),
    new User('Елена Смирнова', 'Редактор', 'elena@example.com'),
    new User('Дмитрий Кузнецов', 'Гость', 'dmitry@example.com'),
];

// 2. Controller (Logic)
$userController = new UserController($users);
$usersFromController = $userController->getUsers();

// 3. View (Presentation)
$markdownView = new MarkdownView();
$markdownOutput = $markdownView->render($usersFromController);

// Output the Markdown
echo $markdownOutput;