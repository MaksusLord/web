<?php
// get_news.inc.php

$news_list = $news->GetNews();

if ($news_list === false) {
    $errMsg = "Произошла ошибка при выводе новостной ленты";
    echo "<p style='color:red;'>$errMsg</p>";
} else {
    $news_count = count($news_list);
    echo "<p>Всего новостей: $news_count</p>";

    foreach ($news_list as $item) {
        echo "<div>";
        echo "<h3>" . htmlspecialchars($item['title']) . "</h3>";
        echo "<p>Категория: " . htmlspecialchars($item['category']) . "</p>";
        echo "<p>" . htmlspecialchars($item['description']) . "</p>";
        echo "<p>Источник: " . htmlspecialchars($item['source']) . "</p>";
        echo "<p>Дата: " . date('Y-m-d H:i:s', $item['datetime']) . "</p>";
        echo "<a href='news.php?del=" . $item['id'] . "'>Удалить</a>"; // Ссылка на удаление
        echo "</div><hr>";
    }
}
?>