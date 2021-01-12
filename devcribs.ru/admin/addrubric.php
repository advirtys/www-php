<?php
include 'connection.php';  
session_start();

if(isset($_SESSION['login_user'])){  
    mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'"); 
   if(isset($_POST['ttitle_rubric'])){
        $title = $_POST['ttitle_rubric'];
 }
    $result = mysql_query("INSERT INTO rubrics (title) VALUES ('$title')");
    if(!$result){
        echo "<h3>Рубрика не добавлена!!!</h3>";
        header("Refresh: 10; URL=/admin/index.php");
        
    } else {
        echo "<h3>Рубрика добавлена!!!</h3>";
        header("Refresh: 1; URL=/admin/index.php");
    }
    
}
 else {
    echo "<h3>Необходима авторизация!</h3>";
    header("Refresh: 3; URL=/admin/index.php");    
} 

