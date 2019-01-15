<?php
    //поставим фильтр допустимых сочетаний символов и trim удалим лишние пробелы
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
    $textItem = trim(filter_var($_POST['textItem'], FILTER_SANITIZE_STRING));


    $error ='';

    if (strlen($title) <= 1) {
        $error = 'Введите заголовок';
    }  else if (strlen($intro) <= 1) {
        $error = 'Введите интро';
    } else if (strlen($textItem) <= 1) {
        $error = 'Введите текст статьи';
    }

    if ($error != '') {
        echo $error;
        exit();
    }

require_once '../MySQL_connect.php';

$sql = 'INSERT INTO articles(title, intro, textItem, date, author) VALUES(?, ?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$title, $intro, $textItem, time(), $_COOKIE['login']]);

echo 'Готово';

?>
