<?php
$user = 'root';
$password = '';
$host = '127.0.0.1';
$db = 'test';
//Data Source Name
$dsn = 'mysql:host='.$host.';dbname='.$db;
//подключаемся к db и перезапишем users
$pdo = new PDO($dsn, $user, $password);
?>
