<?php
include 'connection.php';  
session_start();
if(isset($_SESSION['login_user'])){    
    if(isset($_POST['rubid'])){
    $id = $_POST['rubid'];
 }
$result = mysql_query("DELETE FROM rubrics WHERE id='$id'");
    if(!$result){
        echo "<h3>Рубрика не удалена!!!</h3>";
        header("Refresh: 10; URL=/admin/index.php");
        
    } else {
        echo "<h3>Рубрика удалена!!!</h3>";
        header("Refresh: 1; URL=/admin/index.php");
    }
} else {
    echo "<h3>Необходима авторизация!</h3>";
    header("Refresh: 3; URL=/admin/index.php");    
} 