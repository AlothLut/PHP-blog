<?php
    //поставим фильтр допустимых сочетаний символов и trim удалим лишние пробелы
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error ='';

    if (strlen($username) <= 0) {
        $error = 'Введите имя';
    }  else if (strlen($login) <= 0) {
        $error = 'Введите login';
    } else if (strlen($email) <= 0) {
        $error = 'Введите email';
    } else if (strlen($pass) <= 8) {
        $error = 'Пароль меншье 9 символов';
    }

    if ($error != '') {
        echo $error;
        exit();
    }

//зашифруем пароль md5
$hash = "d299687c6";
$pass = md5($pass.$hash);

require_once '../MySQL_connect.php';

$sql = 'INSERT INTO users(username, login, email, pass) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $login, $email, $pass]);

echo 'Готово';

?>
