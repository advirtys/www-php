<?php include '../database/connect.php';

session_start();
if(isset($_GET['exit'])){
     unset($_SESSION['admin']);
     session_destroy();
 }
 
 function admin($login, $pass){                    
        $result = mysql_fetch_array(mysql_query("SELECT * FROM admins WHERE login='$login'"));
        if($result){
            if($result['pass'] == md5($pass)){                
                $_SESSION['admin'] = $login;
                return TRUE;
            }            
        } else {
            return FALSE;
        }        
    }
    
    if(isset($_POST['login'])){
        $l = $_POST['login'];
    }
    if(isset($_POST['pass'])){
      $p = $_POST['pass'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>Админ панель</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link href="../style/style.css" rel="stylesheet">
</head>
<?php if(admin($l, $p) || isset($_SESSION['admin'])){
echo '<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="wrapper">
        <div id="logo"></div>
	<header class="header">
            <div class="nav"><ul><li style="border: none;"><a href="index.php?id=1">Главная</a></li><li><a href="index.php?id=2">Кто я</a></li><li><a href="index.php?id=3">Услуги</a></li><li><a href="index.php?id=4">Контакты</a></li></ul></div>
        </header><!-- .header-->
        <br>    
	<main class="content">
            <div class="content2">  ';              
                               
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = mysql_fetch_array(mysql_query("SELECT * FROM pages WHERE id = '$id'"));
    echo 
    '<div id="updatepage"><form action="update.php" method="POST">
                    <textarea name="text">'.$result['text'].'</textarea><br>
                    <button name="save" value="'.$id.'">Сохранить</button>
                    <button name="cancel">Отмена</button>
                </form></div>';
} else {
    echo '<h6>Добро пожаловать в админскую панель!</h6>'
    . '<br>'
    . '<h1>Выберете страницу в меню которую хотите отредактировать!</h1>'
            . '<h1>Что бы выйти из админской панели перейдите по <a href="index.php?exit=exit">ссылке</a></h1>';
}

echo '</div>
	</main><!-- .content -->

	<footer class="footer"><br><br>
            <p>';$date = getdate();
            echo $date['year'];
            echo 'год, Казахстан, г. Балхаш Роман Липп ........ разработчик web-сайта <a  href="http://www.devcribs.ru">Абылкасов Максим</a></p>
                <br><br>
	</footer><!-- .footer -->

</div><!-- .wrapper -->

</body>';
} else {
    echo '<body><div id="login_wrapper"><div id="login"><form method="POST" action="index.php">'
    . '<p>Логин: <input name="login" /></p>'
             . '<p>Пароль: <input type="password" name="pass" /></p>'
             . '<button>Вход</button></form></div></div></body> ';
}

?> 
    
        
    
              
            
</html>