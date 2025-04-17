<?php

// Settings.php

class Settings
{
    private static $instance;
    private $data = [];

    // Приватный конструктор, чтобы предотвратить создание экземпляров класса извне
    private function __construct()
    {
        // Можно добавить здесь какую-то логику инициализации, если необходимо
    }

    // Запрещаем клонирование объекта
    private function __clone() {}

    // Запрещаем десериализацию объекта
    public function __wakeup()
    {
        throw new \Exception("Невозможно десериализовать singleton");
    }

    // Статический метод для получения единственного экземпляра класса
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Метод для установки значения
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    // Метод для получения значения
    public function get($key)
    {
        return $this->data[$key] ?? null; // Возвращаем null, если ключ не найден
    }
}