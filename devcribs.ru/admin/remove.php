<?php
include 'connection.php';  
session_start();
if(isset($_SESSION['login_user'])){    
    if(isset($_POST['id'])){
    $id = $_POST['id'];
 }
$result = mysql_query("DELETE FROM articles WHERE id='$id'");
    if(!$result){
        echo "<h3>Статья не удалена!!!</h3>";
        header("Refresh: 10; URL=/admin/index.php");
        
    } else {
        echo "<h3>Статья удалена!!!</h3>";
        header("Refresh: 1; URL=/admin/index.php");
    }
} else {
    echo "<h3>Необходима авторизация!</h3>";
    header("Refresh: 3; URL=/admin/index.php");    
} 

