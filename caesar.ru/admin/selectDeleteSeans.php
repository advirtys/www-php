
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
                 
                 

if(if_admin($l, $p)){
echo <<<ADMIN
<!DOCTYPE html>
<html>
    <head>
        <title>Удалить киносеанс!</title>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        
        <table>
ADMIN;
    ?>
<?php 
include 'connection.php';
   mysql_query("SET NAMES 'utf8'"); 
                    mysql_query("SET CHARACTER SET 'utf8'");
                    mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
                    $result = mysql_query("SELECT * FROM Mon");
                    while ($row = mysql_fetch_array($result)){                         
                        echo "<tr><td>Понидельник:</td><td id='myTd'>".$row['filmTitle']."</td><td id='myTd'><a href='deleteSeansAction.php?db=Mon&id=".$row['id']."'>УДАЛИТЬ???</a></td><tr>";
                    }
                    $result = mysql_query("SELECT * FROM Tue");
                    while ($row = mysql_fetch_array($result)){                         
                        echo "<tr><td>Вторник:</td><td id='myTd'>".$row['filmTitle']."</td><td id='myTd'><a href='deleteSeansAction.php?db=Tue&id=".$row['id']."'>УДАЛИТЬ???</a></td><tr>";                    } 
                    $result = mysql_query("SELECT * FROM Wed");
                    while ($row = mysql_fetch_array($result)){                         
                        echo "<tr><td>Среда:</td><td id='myTd'>".$row['filmTitle']."</td><td id='myTd'><a href='deleteSeansAction.php?db=Wed&id=".$row['id']."'>УДАЛИТЬ???</a></td><tr>";                    } 
                    $result = mysql_query("SELECT * FROM Thu");
                    while ($row = mysql_fetch_array($result)){                         
                        echo "<tr><td>Четверг:</td><td id='myTd'>".$row['filmTitle']."</td><td id='myTd'><a href='deleteSeansAction.php?db=Thu&id=".$row['id']."'>УДАЛИТЬ???</a></td><tr>";                    } 
                    $result = mysql_query("SELECT * FROM Fri");
                    while ($row = mysql_fetch_array($result)){                         
                        echo "<tr><td>Пятница:</td><td id='myTd'>".$row['filmTitle']."</td><td id='myTd'><a href='deleteSeansAction.php?db=Fri&id=".$row['id']."'>УДАЛИТЬ???</a></td><tr>";                    } 
                    $result = mysql_query("SELECT * FROM Sat");
                    while ($row = mysql_fetch_array($result)){                         
                        echo "<tr><td>Суббота:</td><td id='myTd'>".$row['filmTitle']."</td><td id='myTd'><a href='deleteSeansAction.php?db=Sat&id=".$row['id']."'>УДАЛИТЬ???</a></td><tr>";                    } 
                    $result = mysql_query("SELECT * FROM Sun");
                    while ($row = mysql_fetch_array($result)){                         
                        echo "<tr><td>Воскресенье:</td><td id='myTd'>".$row['filmTitle']."</td><td id='myTd'><a href='deleteSeansAction.php?db=Sun&id=".$row['id']."'>УДАЛИТЬ???</a></td><tr>";                    } 
?>
<?php

echo <<<ADMIN
        </table>
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