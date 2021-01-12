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
if(if_admin($l, $p)){
echo <<<ADMIN
<!DOCTYPE html>

<html>
    <head>
        <title>Выберете фильм для редактирвоания</title>
        <meta charset="UTF-8"/>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <form  action="updateFilm.php" method="post">
            <div id='selectFilmUpdate'>
                <h4>Редактировать фильм</h4>
                                <table>
                                    <tr><td ></td><td ><h4>Название</h4></td><td id='tdSelect'><h4>Жанр</h4></td><td id='tdSelect'><h4>Год</h4></td><td id='tdSelect'><h4>Продолжительность</h4></td></tr>
ADMIN;
    ?>
                <?php
            include 'connection.php';
            mysql_query("SET NAMES 'utf8'"); 
                 mysql_query("SET CHARACTER SET 'utf8'");
                 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
                 $result = mysql_query("SELECT * FROM films");
                 while ($row = mysql_fetch_array($result)){
                 echo "<tr><td><input name='id' type='radio' value=".$row['id']."></td><td >".$row['title']."</td><td id='tdSelect'>".$row['genre']."</td><td id='tdSelect'>".$row['year']."</td><td id='tdSelect'>".$row['time']."</td><tr>";                
                 }
            
            ?>
<?php
echo <<<ADMIN
</table>
                <br>
            <button name="submit" type="submit" >Редактировать!</button>
            </div>
            
            
            
            
            
            
        </form>
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
