<?php

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

spl_autoload_register(function ($className) {
    $prefix = 'MyProject\\Classes\\';
    $base_dir = __DIR__ . '/MyProject/Classes/';

    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) !== 0) {
        return;
    }

    $relative_class = substr($className, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

$user1 = new User("Иван", "ivan123", "secret1");
$user2 = new User("Мария", "maria456", "secret2");
$user3 = new User("Петр", "petr789", "secret3");

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

$superUser = new SuperUser("Администратор", "admin", "adminpass", "Администратор");
$superUser->showInfo();

$superUserInfo = $superUser->getInfo();
print_r($superUserInfo);

echo "<br>";
echo "Всего обычных пользователей: " . User::getUserCount() . "<br>";
echo "Всего супер-пользователей: " . SuperUser::getSuperUserCount() . "<br>";
?>

