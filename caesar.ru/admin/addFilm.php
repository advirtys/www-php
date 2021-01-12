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
        <title>Добавить фильм</title>
        <meta charset="UTF-8"/>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <form  action="addFilmAction.php" method="post">
            <h4>Добавить фильм</h4>
            <table>
                <tr>
                    <td><label>Название: </label></td>
                    <td><input id="addFilmInput" name="title"></td>
                </tr>
                <tr>
                    <td><label>Жанр:   </label></td>
                    <td><input id="addFilmInput" name="genre"></td>
                </tr>
                <tr>
                    <td><label>Год: </label></td>
                    <td>
ADMIN;
?>
                                <?php
            $a = getdate(); 
            $n = $a['year'];
            
            echo "<select name='year'>";
 for ($i=$n; $i > 1950; $i--){
     echo "<option  >".$i."</option>";
 }
 echo "</select>";
            ?></td>
                </tr>
                <tr>
                    <td><label>Продолжительность:</label></td>
                    <td><?php
            
            
            echo "<select name='time'>";
 for ($i=1; $i < 60; $i++){
     if ($i < 10){
         $r = "00:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "00:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "01:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "01:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "02:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "02:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "03:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "03:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "04:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "04:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "05:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "05:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 echo "</select>";
            ?>
<?php
echo <<<ADMIN
</td>
                </tr>
                <tr>
                    <td><label>URL картинки <br>
                            (Желательно с kinopoisk.ru):</label></td>
                    <td><input id="addFilmInput" name="img"></td>
                </tr>
                <tr>
                    <td><label>Описание фильма: </label></td>
                    <td><textarea name="description"></textarea></td>
                </tr>
            </table>
            <button name="submit" type="submit" >Добавить!</button>
            
            
            
            
            
            
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
