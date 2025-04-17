<?php

// settings_use.php

// Подключаем файл с реализацией Singleton класса Settings
require_once 'Settings.php';

// Получаем экземпляр класса Settings
$settings = Settings::getInstance();

// Устанавливаем значения
$settings->set('numeric_value', 123);
$settings->set('string_value', 'Привет, Одиночка!');
$settings->set('boolean_value', true);

// Выводим значения на экран
echo "Числовое значение: " . $settings->get('numeric_value') . "<br>";
echo "Строковое значение: " . $settings->get('string_value') . "<br>";
echo "Логическое значение: " . ($settings->get('boolean_value') ? 'истина' : 'ложь') . "<br>";

// Для проверки, что это действительно один и тот же экземпляр:
$anotherSettings = Settings::getInstance();

// Изменяем значение через другой экземпляр
$anotherSettings->set('numeric_value', 456);

// Проверяем, что значение изменилось и в первом экземпляре
echo "Числовое значение (после изменения через другой экземпляр): " . $settings->get('numeric_value') . "<br>"; // Выведет 456

?>