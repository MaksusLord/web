<?php

interface INewsDB {
    function __construct();
    function __destruct();
    function SaveNews($title, $category, $description, $source);
    function GetNews();
    function DeleteNews($id);
}

class NewsDB implements INewsDB, IteratorAggregate {
    const DB_NAME = 'news.db';

    protected $_db;
    private $items = [];

    function __construct() {
        $db_file = dirname(__FILE__) . DIRECTORY_SEPARATOR . self::DB_NAME;
        $db_exists = file_exists($db_file);

        try {
            $this->_db = new SQLite3($db_file);

            if (!$this->_db) {
                throw new Exception("Не удалось подключиться к базе данных.");
            }

            if (!$db_exists) {
                $sql = file_get_contents('news.txt');

                if ($sql === false) {
                    throw new Exception("Не удалось прочитать файл news.txt");
                }

                if (!$this->_db->exec($sql)) {
                    throw new Exception("Ошибка при создании базы данных и таблиц: " . $this->_db->lastErrorMsg());
                }
            }

            $this->getCategories(); // Вызываем метод getCategories() в конструкторе
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    private function getCategories() {
        $sql = "SELECT id, name FROM category";
        $result = $this->_db->query($sql);

        if ($result) {
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $this->items[$row['id']] = $row['name'];
            }
        } else {
            // Обработка ошибок при получении категорий.
            error_log("Ошибка при получении категорий: " . $this->_db->lastErrorMsg());
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    function __destruct() {
        if ($this->_db) {
            $this->_db->close();
        }
    }

    function SaveNews($title, $category, $description, $source) {
        $title = trim($title);
        $description = trim($description);
        $source = trim($source);

        if (empty($title) || empty($description) || empty($source)) {
            return false; // Не сохраняем, если есть пустые поля
        }

        $stmt = $this->_db->prepare("INSERT INTO msgs (title, category, description, source, datetime) VALUES (:title, :category, :description, :source, :datetime)");
        $stmt->bindValue(':title', $title, SQLITE3_TEXT);
        $stmt->bindValue(':category', $category, SQLITE3_INTEGER);
        $stmt->bindValue(':description', $description, SQLITE3_TEXT);
        $stmt->bindValue(':source', $source, SQLITE3_TEXT);
        $stmt->bindValue(':datetime', time(), SQLITE3_INTEGER);

        $result = $stmt->execute();

        return $result !== false;
    }

    function GetNews() {
        $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime
                  FROM msgs
                  INNER JOIN category ON category.id = msgs.category
                  ORDER BY msgs.datetime DESC";

        $result = $this->_db->query($sql);
        $items = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $items[] = $row;
        }

        return $items;
    }

    function DeleteNews($id) {
        $id = abs((int)$id);

        $stmt = $this->_db->prepare("DELETE FROM msgs WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        $result = $stmt->execute();

        return $result !== false;
    }
}
?>