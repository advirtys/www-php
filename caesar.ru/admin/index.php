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
        <title>Админ панель</title>
        <meta charset="UTF-8"/>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <div id="menu">
            <ul>
            
                <h4>РАБОТА С ФИЛЬМАМИ</h4>
            
            <li>
                <a href="addFilm.php?login=$l&pass=$p" target="_blank">Добавить фильм</a>
            </li>
            <li>
                <a href="selectUpdateFilm.php?login=$l&pass=$p" target="_blank">Редактировать фильм</a>
            </li>
            <li>
                <a href="selectDeleteFilm.php?login=$l&pass=$p" target="_blank">Удалить фильм</a>
            </li>
            <h4>РАСПИСАНИЕ КИНОТЕАТРА</h4>
            <li>
                <a href="addSeans.php?login=$l&pass=$p" target="_blank">Добавить киносеанс</a>
            </li>
            <li>
                <a href="selectDeleteSeans.php?login=$l&pass=$p" target="_blank">Удалить киносеанс</a>
            </li>
            <li>
                <a href="deleteAllSeanses.php?login=$l&pass=$p" target="_blank">Удалить киносеансы</a>
            </li>
        </ul>
        </div>
        <div id="desc">
            <h1>ВНИМАНИЕ!!! РАБОТАЯ В АДМИНСКОЙ ПАНЕЛИ БУДЬТЕ ВНИМАТЕЛЬНЫ ЧТО БЫ НЕ УДАЛИТЬ ЛИШНЕГО.</h1>
            <p>Выберите то что хотите сделать!</p>
            <p>Если база данных с фильмами пуста то следует <a href="addFilm.php">Добавить фильм</a>.</p>
            <p>Если в базе данных нет конкретного фильма то следует добавить его.</p>
            <p>Если вы добавили фильм, но допустили ошибки когда заполняли поля, то вам следует выбрать пункт <a href="selectUpdateFilm.php">Редактировать фильм</a></p>
            <p>Если фильм больше не будете показывать, то нужно <a href="selectDeleteFilm.php">Удалить фильм</a></p>
            <p>После того как вы добавили, или отредактировали фильм, вам нужно составить расписание кинотеатра!</p>
            <p>Для этого выберите пункт <a href="addSeans.php">Добавить коносеанс</a></p>
            <p>Если вы добавили киносеанс не тот который хотели то вы его можете <a>удалить</a></p>
            <p>Так же если киносеансы прошли то вы можете удалить их <b>все</b> для этого выберите пункт <a>Удалить киносеансы</a></p>
                
        </div>
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