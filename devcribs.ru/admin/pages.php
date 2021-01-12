<?php include 'connection.php';
 session_start();
 mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>Редактировать страницы</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link href="style/style.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">

	<header class="header">
		 <p><span id="green">/**<br>* Created by max on 2015-08-11 <br>**/</span><br>
                    <span id="orange">class</span> <span id="white">Pages {</span><br>
                    <span id="orange2">public static void</span> <samp id="yellow">main</samp><span id="white">(String[] args) {</span><br>
                    <span id="white2">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"Здесь вы можете отредактировать страницы!"</span><span id="white">)</span><span id="orange">;</span><br>
                    <span id="white3">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"Что бы выйти нажмите <a id="green" href="index.php?exit=exit">СЮДА!!!</a>"</span><span id="white">)</span><span id="orange">;</span></p>
	</header><!-- .header-->	
                                        
                                            <?php   if(isset($_SESSION['login_user'])){          echo '<div class="middle"><div class="container">
                    <div id="liMenuBorder"><ul>
            <li ><a id="liMenu" href="index.php">Main</a></li>
            <li ><a id="liMenu" href="addarticles.php">Добавить статью</a></li>
            <li ><a id="liMenu" href="pages.php?add=add">Добавить страницу</a></li>
            <li ><a id="liMenu" href="pages.php">Страницы</a></li>            
            </ul></div>
			<main class="content">
                            <div id="contentt"><div>';
                                            if(isset($_GET['add'])){
                                                echo '<form id="addPage" action="addpage.php" method="POST">
 <h4>Добавить страницу</h4>
 <table>
    <tr><td><h5>Название: </h5></td><td>
                <input name="title"/></td></tr>                
                    <tr><td></td><td><textarea name="head"></textarea></td></tr>
                        <tr><td></td><td><textarea name="content"></textarea></td></tr>
                            <tr><td></td><td><button>Добавить</button></td></tr>
        </table>
        </form>';                                                 
                                                
                                            } else if (isset ($_POST['id'])){
                                                $id = $_POST['id'];
$result = mysql_fetch_array(mysql_query("SELECT * FROM pages WHERE id='$id'"));
$id = $result['id'];
$title = $result['title'];
$head = $result['head'];
$content = $result['content'];    
echo '<form id="addPage" action="updatepage.php" method="POST">
 <h4>Редактировать страницу</h4>
 <table>
    <tr><td><h5>Название: </h5></td><td>
                <input name="title" value="'.$title.'"/></td></tr>                
                    <tr><td></td><td><textarea name="head">'.$head.'</textarea></td></tr>
                        <tr><td></td><td><textarea name="content">'.$content.'</textarea></td></tr>
                            <tr><td></td><td><button name="id" value="'.$id.'">Сохранить</button></td></tr>
        </table>
        </form>'; 
                                            } else  {
    

                            
echo '<table id="pages">
                                        <tr><td><p>Название</p></td><td></td><td></td></tr>';
$result = mysql_query("SELECT * FROM pages WHERE id > 1");

 while ($col = mysql_fetch_array($result)){
     $id = $col['id'];
     $title = $col['title'];
          
echo <<<PAGE
    <tr><td>$title</td><td><form action="delpage.php" method="POST"><button name="id" value="$id">удалить</button></form></td><td>
        <form action="pages.php" method="POST"><button name="id" value="$id">редактировать</button></form></td></tr>
PAGE;
 }

                                
                                echo '</table>';     }                           echo '</div> </div>
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
                </div><!-- .middle-->'; } else { 
    
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
