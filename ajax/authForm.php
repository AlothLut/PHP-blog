<?php
    //поставим фильтр допустимых сочетаний символов и trim удалим лишние пробелы
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';

     if (strlen($login) <= 0) {
        $error = 'Введите login';
    }  else if (strlen($pass) <= 8) {
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


$sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass';
$query = $pdo->prepare($sql);
$query->execute(['login' => $login, 'pass' => $pass]);
// fetch позволяет получить лишь одну запись из бд
$user = $query->fetch(PDO::FETCH_OBJ);
// проверка и установка cookie на месяц +-
if ($user->id == 0) {
    echo 'Такого пользователя не существует';
} else {
    setcookie('login', $login, time()+3600*24*30, '/');
    echo 'Готово';
}

?>
