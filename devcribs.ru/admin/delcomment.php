<?php
include 'connection.php';  
session_start();
mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'"); 
if(isset($_SESSION['login_user'])){    
   if(isset($_POST['id'])){
    $id = $_POST['id'];
}
$result = mysql_query("DELETE FROM comment WHERE id = '$id'");
if(!$result){
    echo "Комментарий не удален!!!";
    header("Refresh: 3; URL=/admin/comments.php");    
} else {
    echo "Комментарий удален!!!";
    header("Refresh: 1; URL=/admin/comments.php");    
}
    
}
 else {
    echo "<h3>Необходима авторизация!</h3>";
    header("Refresh: 3; URL=/admin/index.php");    
} 

