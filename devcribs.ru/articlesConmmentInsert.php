<?php
include 'phpmain/connection.php';
 mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
if(isset($_POST['articlesC'])){
        $id = $_POST['articlesC'];
    }  
if(isset($_POST['nameC'])){
        $name = $_POST['nameC'];
    }
if(isset($_POST['emailC'])){
    $email = $_POST['emailC'];
    } 
if(isset($_POST['comment'])){
    $text = $_POST['comment'];
    }


    
    if($name != null && $email != null && $text != null && $id != null){
        $name = clean($name);
        $email = clean($email);
        $text = clean($text);        
        if(!empty($name) && !empty($email) && !empty($text)){
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL); 
    if(check_length($name, 2, 25) && check_length($text, 2, 300) && $email_validate) {
            $date = date("Y-m-d");
            $result = mysql_query("INSERT INTO comment (name, email, text, articles, date) VALUES ('$name', '$email_validate', '$text', '$id', '$date')");
            mail("advirtys2@gmail.com", "Новый комментарий $date от $name", "Комментарий оставил $name $date. \n"
                    . "$name пишет: \n"
                    . "-------------------------------------------------------------\n"
                    . "$text \n"
                    . "-------------------------------------------------------------\n"
                    . "Что бы посмотреть его перейдите по ссылке http://www.devcribs.ru/articles.php?id=$id");
            if($result){
                header("Location:articles.php?id=$id");
                }             
            } else {
                echo '<p>Проверьете правильность введенного имени и email.</p>'
                . '<p>Длина комментария должна быть не меньше 2 и не больше 300 символов</p>';
                echo '<p>Подождите вас перенаправят!</p>';
                header("Refresh: 3; URL=articles.php?id=$id");
            }
        } 
    }
           
 function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}   

function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}
       
?>