<?php
include 'connection.php';  
session_start();
mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'"); 
if(isset($_SESSION['login_user'])){    
   if(isset($_POST['title'])){
        $title = $_POST['title'];
}
if(isset($_POST['head'])){
        $head = $_POST['head'];
}
if(isset($_POST['content'])){
        $content = $_POST['content'];
}
    $result = mysql_query("INSERT INTO pages (title,  head, content) VALUES ('$title', '$head', '$content')");
    if(!$result){
        echo "<h3>Страница не добавлена!!!</h3>";
        header("Refresh: 3; URL=/admin/index.php");
        
    } else {
        echo "<h3>Страница добавлена!!!</h3>";
        header("Refresh: 1; URL=/admin/index.php");
    }
    
}
 else {
    echo "<h3>Необходима авторизация!</h3>";
    header("Refresh: 3; URL=/admin/index.php");    
} 

