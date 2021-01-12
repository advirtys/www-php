<?php
function if_admin($login, $pass){ // проверяет пользователя, является ли он администратором
    if(!mysql_connect("localhost","makc","123456789")) // подключение в БД
          die('Ошибка при подключении к базе данных #1'); //ошибка 1 - ошибка подключения
    elseif(!mysql_select_db("caesar"))
          die('Ошибка при подключении к базе данных #2'); //ошибка 2 - ошибка выбора базы данных
    $result = mysql_fetch_array(mysql_query("SELECT * FROM admins WHERE login='".$login."'"));
    if($result){
        if($result['pass'] == md5($pass)){
            return true;
        }
    } 
    else{
        return false;
    }
}
if (isset($_GET['login'])){
   $l = $_GET['login'];
}
if (isset($_GET['pass'])){
    $p = $_GET['pass'];
}

include 'connection.php';
            mysql_query("SET NAMES 'utf8'"); 
                 mysql_query("SET CHARACTER SET 'utf8'");
                 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
                 
                 
?>

<?php
if(if_admin($l, $p)){
echo <<<ADMIN
<!DOCTYPE html>
<html>
   
    <head>
        <title>Удалить все киносеансы!</title>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
ADMIN;
?>
    

<?php 
include 'connection.php';
mysql_query("TRUNCATE TABLE `caesar`.`Mon`");
mysql_query("TRUNCATE TABLE `caesar`.`Tue`");
mysql_query("TRUNCATE TABLE `caesar`.`Wed`");
mysql_query("TRUNCATE TABLE `caesar`.`Thu`");
mysql_query("TRUNCATE TABLE `caesar`.`Fri`");
mysql_query("TRUNCATE TABLE `caesar`.`Sat`");
mysql_query("TRUNCATE TABLE `caesar`.`Sun`");

echo "<h1 id='addFilm'>Все киносеансы успешно удалены!"
             . "</h1>";
            
?>
<?php

echo <<<ADMIN
</body>
</html>
ADMIN;
}
else{
    echo <<<ADMIN
    <!DOCTYPE html>

<html>
    <head>
        <title>Админ панель</title>
        <meta charset="UTF-8"/>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <form action="index.php?login=login&pass=pass" >
            <label>Логин:</label>
            <input name="login"/>
            <label>Пароль:</label>
            <input name="pass"/>
            <button type="submit">Вход</button>
        </form>
    </body>        
</html>
ADMIN;
}

?>
