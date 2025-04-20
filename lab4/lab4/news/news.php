<?php
// news.php

require_once 'NewsDB.class.php';

$news = new NewsDB();
$errMsg = "";

// Handle deletion if 'del' parameter exists
if (isset($_GET['del'])) {
    require_once 'delete_news.inc.php';
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'save_news.inc.php';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Новостная лента</title>
</head>
<body>
    <h1>Последние новости</h1>
    <?php
    if ($errMsg != "") {
        echo "<p style='color:red;'>$errMsg</p>";
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Заголовок: <input type="text" name="title"><br>
        Категория:
        <select name="category">
            <option value="1">Политика</option>
            <option value="2">Культура</option>
            <option value="3">Спорт</option>
        </select><br>
        Описание: <textarea name="description"></textarea><br>
        Источник: <input type="text" name="source"><br>
        <input type="submit" value="Добавить новость">
    </form>

    <h2>Новости:</h2>
    <?php
        require_once 'get_news.inc.php';
    ?>

</body>
</html>