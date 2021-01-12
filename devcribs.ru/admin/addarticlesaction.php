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
if(isset($_POST['date'])){
        $date = $_POST['date'];
}
if(isset($_POST['author'])){
        $author = $_POST['author'];
}
if(isset($_POST['rubric'])){
        $rubric = $_POST['rubric'];
}
if(isset($_POST['text'])){
        $text = $_POST['text'];
}
    
    $result = mysql_query("INSERT INTO articles (title, date, author, rubric, text, description) VALUES ('$title', '$date', '$author', '$rubric', '$text', '$text')");
    if(!$result){
        echo "<h3>Статья не добавлена!!!</h3>";
        header("Refresh: 10; URL=/admin/index.php");
        
    } else {
        echo "<h3>Статья добавлена!!!</h3>";
        header("Refresh: 1; URL=/admin/index.php");
    }
    
}
 else {
    echo "<h3>Необходима авторизация!</h3>";
    header("Refresh: 3; URL=/admin/index.php");    
} 

