<?php
// delete_news.inc.php

if (isset($_GET['del'])) {
    $id = filter_var($_GET['del'], FILTER_VALIDATE_INT);

    if ($id === false || $id === null) { // Check if the ID is a valid integer
        header("Location: news.php"); // Redirect to clear the invalid 'del' parameter
        exit;
    }

    if ($news->DeleteNews($id)) {
        header("Location: news.php"); // Redirect to refresh the page after deletion
        exit;
    } else {
        $errMsg = "Произошла ошибка при удалении новости";
    }
} else {
     header("Location: news.php"); // If del is not set, redirect
     exit;
}
?>