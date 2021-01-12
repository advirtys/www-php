<?php
$user = "makc";
$pass = "123456789";
$db = "devcribs";
$host = "127.0.0.1";

    $connection = mysql_connect($host, $user, $pass) or die("# 1)___ошибка подключения к БД!");
    $db = mysql_select_db($db) or die("# 2)___не правильно указано название БД!");
    
?>
