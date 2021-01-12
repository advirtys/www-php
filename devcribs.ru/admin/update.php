<?php
include 'connection.php';  
session_start();
 mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
if(isset($_SESSION['login_user'])){    
   if(isset($_POST['save'])){
            $id = $_POST['save'];    
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
$result = mysql_query("UPDATE articles SET title='$title', date = '$date', author='$author', rubric='$rubric', text='$text', description='$text' WHERE id='$id'");
    if(!$result){
        echo "<h3>Статья не обновлена!!!</h3>";
        header("Refresh: 10; URL=/admin/index.php");
        
    } else {
        echo "<h3>Статья обновлена!!!</h3>";
        header("Refresh: 1; URL=/admin/rubrics.php?rubric=$rubric");
    }
}
if(isset($_POST['cancel'])){       
    header("Refresh: 0; URL=/admin/index.php");
}
    
}
 else {
    echo "<h3>Необходима авторизация!</h3>";
    header("Refresh: 3; URL=/admin/index.php");    
} 
