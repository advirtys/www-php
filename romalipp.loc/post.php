<?php
include './database/connect.php';
$login = mysql_fetch_array(mysql_query("SELECT * FROM admins"));


if(isset($_POST['submit'])){
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['message'])){
        $message = $_POST['message'];
    }
    mail($login, $name." прислал письмо", $message);
    echo "<h3>Письмо отправлено, спасибо!!!</h3>";
            header("Refresh: 1; URL=/admin/index.php");
}

