<?php include 'connection.php';
 session_start();
 if ($_GET['rubric']){
     $rubric = $_GET['rubric'];
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
	<title><?php echo $rubric ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link href="style/style.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">

	<header class="header">
		 <p><span id="green">/**<br>* Created by max on 2015-08-11 <br>**/</span><br>
                    <span id="orange">class</span> <span id="white"><?php echo $rubric ?> {</span><br>
                    <span id="orange2">public static void</span> <samp id="yellow">main</samp><span id="white">(String[] args) {</span><br>
                    <span id="white2">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"Добро пожаловать в рубрику <?php echo $rubric ?>!"</span><span id="white">)</span><span id="orange">;</span><br>
                    <span id="white3">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"Что бы выйти нажмите <a id="green" href="index.php?exit=exit">СЮДА!!!</a>"</span><span id="white">)</span><span id="orange">;</span></p>
	</header><!-- .header-->                                                                      
                                        <?php if(isset($_SESSION['login_user'])){  
                                        echo '<div class="middle">

		<div class="container">
                    <div id="liMenuBorder"><ul>
                            <li ><a id="liMenu" href="index.php">Main</a></li>
                            <li ><a id="liMenu" href="addarticles.php">Добавить статью</a></li>
                            <li ><a id="liMenu" href="pages.php">Страницы</a></li>
                            <li ><a id="liMenu" href="comments.php">Коментарии</a></li>
            </ul></div>
			<main class="content">
                            <div id="contentt"><div>
                                    <table>';
                                
    $num = 5;
    $page = $_GET['page'];                            
    $result = mysql_query("SELECT COUNT(*) FROM articles WHERE rubric = '$rubric'");
    $posts = mysql_result($result, 0);  
    $total = intval(($posts - 1) / $num) + 1;  
    $page = intval($page);
    if(empty($page) or $page < 0) $page = 1;  
        if($page > $total) $page = $total; 
    $start = $page * $num - $num; 
    $result = mysql_query("SELECT * FROM articles WHERE rubric = '$rubric' ORDER BY date LIMIT $start, $num ");
    while ($col = mysql_fetch_array($result)){
       $id = $col['id']; 
       $title = $col['title'];       
       $desc = $col['description'];
       $date = $col['date'];
       echo <<<ARTICLES
       <tr><td><h1>$title</h1><h2>$date</h2></td></tr>
    <tr><td>$desc</td></tr>
               <tr id="tdBord"><td>
                   <form id="read" method="GET" action="/articles.php">
                                        <button name="id" value="$id">Читать далее...</button>
               </form>
            <form id="update" method="GET" action="updatearticles.php">
                                        <button name="id" value="$id">Редактировать</button>
               </form>
               <form id="remove" method="POST" action="remove.php">
                                        <button name="id" value="$id">Удалить</button>
               </form>
               
                                    
                                        </td></tr>
               
ARTICLES;
    }echo '</table>
                                    <br>';
// Проверяем нужны ли стрелки назад  
if ($page != 1) $pervpage = '<a style=padding-right:20px; href= ./rubrics.php?rubric='.($rubric).'&page='. ($page - 1) .'>Предыдущая</a> ';  
// Проверяем нужны ли стрелки вперед  
if ($page != $total) $nextpage = '<a style=padding-left:25px; href= ./rubrics.php?rubric='.($rubric).'&page=' .($page + 1). '>Следующая</a>';  

// Находим две ближайшие станицы с обоих краев, если они есть  
if($page - 2 > 0) $page2left = '<a style=padding-left:10px; href= ./rubrics.php?rubric='.($rubric).'&page='. ($page - 2) .'>'. ($page - 2) .'</a>  ';  
if($page - 1 > 0) $page1left = '<a style=padding-left:10px; href= ./rubrics.php?rubric='.($rubric).'&page='. ($page - 1) .'>'. ($page - 1) .'</a>  ';  
if($page + 2 <= $total) $page2right = '  <a style=padding-left:10px; href= ./rubrics.php?rubric='.($rubric).'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';  
if($page + 1 <= $total) $page1right = '  <a style=padding-left:10px; href= ./rubrics.php?rubric='.($rubric).'&page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

// Вывод меню  
echo $pervpage.$page2left.$page1left."<b style='padding-left:10px; color: #9876AA; font-weight: bold;'>".$page."</b>".$page1right.$page2right.$nextpage; 

echo '<br>
                                </div>
                            
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
