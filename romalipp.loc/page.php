<?php include './database/connect.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
 $result = mysql_fetch_array(mysql_query("SELECT * FROM pages WHERE id = '$id'"));

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?php echo $result['title']; ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link href="style/style.css" rel="stylesheet">
</head>

<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="wrapper">
        <div id="logo"></div>
	<?php include './includes/menu.php'; ?>
        <br>    
	<main class="content">
            <div class="content2">
                <?php echo $result['text']; 
                if($id==4){
                    echo '<div id="email"><h4>Так же вы можете напиcать мне письмо:</h4>
                            <form action="post.php" method="POST">
                                <table>
                                    <tr><td><h2>Имя: </h2></td><td><input name="name"/></td></tr>
                                <tr><td><h2>e-mail: </h2></td><td><input name="email" /></td></tr>
                                <tr><td></td><td><textarea name="message"></textarea></td></tr>
                                <tr><td></td><td><button name="submit">Отправить</button></td></tr>
                                </table>
                            </form></div>';
                }
                ?>
                
                
            </div>
	</main><!-- .content -->

	<footer class="footer"><br><br>
            <p><?php $date = getdate();
            echo $date['year'];?> год, Казахстан, г. Балхаш Роман Липп ........ разработчик web-сайта <a  href="http://www.devcribs.ru">Абылкасов Максим</a></p>
	<br><br>
        </footer><!-- .footer -->

</div><!-- .wrapper -->

</body>
</html>