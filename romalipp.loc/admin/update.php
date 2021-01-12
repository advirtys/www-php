<?php
include '../database/connect.php';  
session_start(); 
if(isset($_SESSION['admin'])){    
if(isset($_POST['save'])){
        $id = $_POST['save'];
        
    if(isset($_POST['text'])){
            $text = $_POST['text'];
    }

    $result = mysql_query("UPDATE pages SET text='$text' WHERE id='$id'");
        if(!$result){
            echo "<h3>Страница не обновлена!!!</h3>";
            header("Refresh: 3; URL=/admin/index.php");

        } else {
            echo "<h3>Страница обновлена!!!</h3>";
            header("Refresh: 1; URL=/admin/index.php");
        }
}

if (isset($_POST['cancel'])){
        header("Refresh: 0; URL=/admin/index.php");
}
    
}
 else {
    echo "<h3>Необходима авторизация!</h3>";
    header("Refresh: 3; URL=/admin/index.php");    
} 

