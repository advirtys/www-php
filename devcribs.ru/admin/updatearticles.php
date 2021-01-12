<?php include 'connection.php';
 session_start();
if ($_GET['id']){
    $id = $_GET['id'];   
} 
 mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>Добавить статью</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link href="style/style.css" rel="stylesheet">
        <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
	<script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
        <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushJava.js"></script>
        <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushPhp.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="js/settag.js"></script> 
        
        
        
	<link type="text/css" rel="stylesheet" href="syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
</head>

<body>

<div class="wrapper">

	<header class="header">
		 <p><span id="green">/**<br>* Created by Max on <?php echo  date("Y-m-d"); ?> <br>**/</span><br>
                    <span id="orange">class</span> <span id="white">Article {</span><br>
                    <span id="orange2">public static void</span> <samp id="yellow">main</samp><span id="white">(String[] args) {</span><br>
                    <span id="white2">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"Здесь вы можете добавить статью!"</span><span id="white">)</span><span id="orange">;</span><br>
                    <span id="white3">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"Что бы выйти нажмите <a id="green" href="index.php?exit=exit">СЮДА!!!</a>"</span><span id="white">)</span><span id="orange">;</span></p>
	</header><!-- .header-->
        

	<?php  if(isset($_SESSION['login_user'])){       echo '<div class="middle">

		<div class="container">
                    <div id="liMenuBorder"><ul>
            <li ><a id="liMenu" href="index.php">Main</a></li>
            <li ><a id="liMenu" href="addarticles.php">Добавить статью</a></li>
            </ul></div>
			<main class="content">
                            <div id="contentt">
                                <div>';
        $result = mysql_fetch_array(mysql_query("SELECT * FROM articles WHERE id = '$id'"));
        $id = $result['id'];
        $title = $result['title'];
        $date = $result['date'];        
        $text = $result['text'];
        $rubric = $result['rubric'];
        $author = $result['author'];
        echo <<<LOGIN
                                
                                    <form  action="update.php" method="POST">
                                        <h1 style="margin-bottom: 10px; 
    font: 16px Arial, sans-serif; font-weight: bold;">Редактировать статью</h1> 
            <table id="articles">                
                <tr><td><h5>Название:</h5></td><td><input name="title" value="$title"/></td></tr>
                <tr><td><h5>Дата:</h5></td><td><input name="date" type="date" value="$date"/></td></tr>
                <tr><td><h5>Рубрика:</h5></td><td><input name="rubric" value="$rubric"/></td></tr>
                <tr><td><h5>Автор:</h5></td><td><input name="author" value="$author"/></td></tr>
LOGIN;
echo <<<SETTAG
        <tr><td></td><td>
                <a onclick="link()">[link]</a> 
                <a onclick="pre()">[pre]</a> 
                <a onclick="paragraf()">[p]</a> 
                <a onclick="bold()">[b]</a>
                <a onclick="italic()">[i]</a>
                <a onclick="img()">[img]</a>
                <a onclick="img2()">[img2]</a>
                <a onclick="h1()">[h1]</a>
                <a onclick="h2()">[h2]</a>
                <a onclick="h3()">[h3]</a>
                <a onclick="h4()">[h4]</a>
                <a onclick="h5()">[h5]</a>
                <a onclick="h6()">[h6]</a>
            </td></tr>
SETTAG;
                
echo <<<LOGIN
<tr><td></td><td><textarea id="text" name="text">$text</textarea></td></tr>
                <tr><td></td><td><button name="save" value="$id">Сохранить</button> <button name="cancel" value="0">Отмена</button></td></tr>
            </table>
        </form>
LOGIN;

echo '</div>                            
                            </div>
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="right-sidebar">
                    <div><div id="divNav"><p>Рубрики</p></div>
                        <ul>';
       
                        $result = mysql_query("SELECT * FROM rubrics");
    while ($col = mysql_fetch_array($result)){        
       $title = $col['title'];       
           echo <<<LI
       <li><a href="rubrics.php?rubric=$title">$title</a></li>
LI;
    }
                        echo '</ul><br>
                        <div id="divNav"><p>Добавить рубрику</p></div><div id="addRub">
                        <form action="addrubric.php" method="POST">
                        <input name="ttitle_rubric" />
                        <button>Добавить</button>
                        </form>
</div><br>
<div id="divNav"><p>Удалить рубрику</p></div><div id="delRub"><form action="delrubric.php" method="POST">'; 
                        $result = mysql_query("SELECT * FROM rubrics");
    while ($col = mysql_fetch_array($result)){  
       $rubid = $col['id']; 
       $title = $col['title'];       
           echo <<<LI
       <button name="rubid" value="$rubid">$title удалить</button>
LI;
           }
           echo '
                        </form>
</div></div>
		</aside><!-- .right-sidebar -->
	</div><!-- .middle-->';} else { 
    
     echo '<div id="login"><form method="POST" action="index.php">'
    . '<p>Логин: <input name="login" /></p>'
             . '<p>Пароль: <input type="password" name="pass" /></p>'
             . '<button>Вход</button></form></div>';
}

?>
	<footer class="footer">
<div id="bottom"><p> <span id="white3">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"<?php $date = getdate();
          echo $date['year'];?> год, по всем вопросам пришите на <a id="green" href="mailto:advirtys@gmail.com">e-mail</a>..."</span><span id="white">)</span><span id="orange">;</span><br><span id="white_t">}</span><br><span id="white">}</span></p></div>
            <br>	</footer><!-- .footer -->

</div><!-- .wrapper -->

</body>
</html>
