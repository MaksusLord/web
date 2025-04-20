<?php
// save_news.inc.php
// Обработчик HTML-формы

if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['source'])) {
    $errMsg = "Заполните все поля формы!";
} else {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $category = (int)$_POST['category'];
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $source = filter_var($_POST['source'], FILTER_SANITIZE_STRING);

    if ($news->SaveNews($title, $category, $description, $source)) {
        header("Location: news.php"); // Перезапрос страницы для обновления
        exit;
    } else {
        $errMsg = "Произошла ошибка при добавлении новости";
    }
}
?>