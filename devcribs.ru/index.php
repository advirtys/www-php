<?php include 'phpmain/connection.php';
 
 mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
 $result = mysql_query("SELECT * FROM pages WHERE id=1");
    while ($col = mysql_fetch_array($result)){
       $title = $col['title'];
       $head = $col['head'];
       $content = $col['content'];
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?php echo $title ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link href="style/style.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">

	<header class="header">
		 <p><span id="green">/**<br>* Created by max on 2015-08-11 <br>**/</span><br>
                    <span id="orange">class</span> <span id="white">Devcribs {</span><br>
                    <span id="orange2">public static void</span> <samp id="yellow">main</samp><span id="white">(String[] args) {</span><br>
                    <?php echo $head;  ?>
	</header><!-- .header-->

	<div class="middle">

		<div class="container">
                    <div id="liMenuBorder"><ul>
                            
            <?php
            $result = mysql_query("SELECT * FROM pages");
    while ($col = mysql_fetch_array($result)){
        $id = $col['id'];
       $title = $col['title'];
       $url = $col['url']; 
       
       if($title=="Main"){
           echo <<<LI
           <li ><a id="liMenu" href="index.php">$title</a></li>
       
LI;
       } else {
       
           echo <<<LI
           <li ><a id="liMenu" href="page.php?id=$id">$title</a></li>
LI;
        }      
    }    
    
?>
            </ul></div>
			<main class="content">
                            <div id="contentt"><div>
                                    <table>
                                <?php 
                                
                                $num = 5;
    $page = $_GET['page'];                            
    $result = mysql_query("SELECT COUNT(*) FROM articles");
    $posts = mysql_result($result, 0);  
    $total = intval(($posts - 1) / $num) + 1;  
    $page = intval($page);
    if(empty($page) or $page < 0) $page = 1;  
        if($page > $total) $page = $total; 
    $start = $page * $num - $num; 
                            $result = mysql_query("SELECT * FROM articles ORDER BY date DESC LIMIT $start, $num ");
    while ($col = mysql_fetch_array($result)){
       $id = $col['id']; 
       $title = $col['title'];       
       $desc = $col['description'];
       $date = $col['date'];
       echo <<<ARTICLES
       <tr><td><h3>$title</h3><h1>$date</h1></td></tr>
    <tr><td>$desc</td></tr>
               <tr id="tdBord"><td><h2><a href='articles.php?id=$id'>Читать далее...</a></h2></td></tr>
               
ARTICLES;
    }
    ?>
                                    </table>
                                    <br>
                                    <?php  
// Проверяем нужны ли стрелки назад  
if ($page != 1) $pervpage = '<a style=padding-right:20px; href= ./index.php?page='. ($page - 1) .'>Предыдущая   </a> ';  
// Проверяем нужны ли стрелки вперед  
if ($page != $total) $nextpage = '<a style=padding-left:25px; href= ./index.php?page=' .($page + 1). '>   Следующая</a>';  

// Находим две ближайшие станицы с обоих краев, если они есть  
if($page - 2 > 0) $page2left = ' <a style=padding-left:10px; href= ./index.php?page='. ($page - 2) .'>'. ($page - 2) .'</a>  ';  
if($page - 1 > 0) $page1left = '<a style=padding-left:10px; href= ./index.php?page='. ($page - 1) .'>'. ($page - 1) .'</a>  ';  
if($page + 2 <= $total) $page2right = '  <a style=padding-left:10px; href= ./index.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';  
if($page + 1 <= $total) $page1right = '  <a style=padding-left:10px; href= ./index.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

// Вывод меню  
echo $pervpage.$page2left.$page1left."<b style='padding-left:10px; color: #9876AA; font-weight: bold;'>".$page."</b>".$page1right.$page2right.$nextpage;  

?>
                                    <br>
                                </div>
                            
                            </div>
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="right-sidebar">
                    <div><div id="divNav"><p>Рубрики</p></div>
                        <ul><?php
                        $result = mysql_query("SELECT * FROM rubrics");
    while ($col = mysql_fetch_array($result)){        
       $title = $col['title'];       
           echo <<<LI
       <li><a href="rubrics.php?rubric=$title">$title</a></li>
LI;
    }
                        ?></ul></div>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- rigth-side -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2468608855978671"
     data-ad-slot="1669867341"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		</aside><!-- .right-sidebar -->

	</div><!-- .middle-->

	<footer class="footer">
<div id="bottom"><p> <span id="white3">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"<?php $date = getdate();
          echo $date['year'];?> год, по всем вопросам пришите на <a id="green" href="mailto:advirtys@gmail.com">e-mail</a>..."</span><span id="white">)</span><span id="orange">;</span><br><span id="white_t">}</span><br><span id="white">}</span></p></div>
            <br>	</footer><!-- .footer -->

</div><!-- .wrapper -->

</body>
</html>
