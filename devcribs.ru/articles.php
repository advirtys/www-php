<?php include 'phpmain/connection.php';
if ($_GET['id']){
    $identificator = $_GET['id'];
}
 
  mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
  $result = mysql_query("SELECT * FROM articles WHERE id='$identificator'");
    while ($col = mysql_fetch_array($result)){
       $titleart = $col['title'];      
       $content = $col['text'];
       $author = $col['author'];
       $rubric = $col['rubric'];
       $date = $col['date'];
    }
    
?>
<!DOCTYPE html>
<html>
    <head> 
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?php echo $titleart ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link href="style/style.css" rel="stylesheet">
        <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
	<script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
        <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushJava.js"></script>
        <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushPhp.js"></script>
        <script type="text/javascript" src="syntaxhighlighter_3.0.83/scripts/shBrushPhp.js"></script>
        
	<link type="text/css" rel="stylesheet" href="syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
        <link type="text/css" rel="stylesheet" href="syntaxhighlighter_3.0.83/styles/shCore.css"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
</head>

<body>

<div class="wrapper">

	<header class="header">
		 <p><span id="green">/**<br>* Created by <?php echo $author ?> on <?php echo $date ?> <br>**/</span><br>
                    <span id="orange">class</span> <span id="white"><?php echo $rubric ?> {</span><br>
                    <span id="orange2">public static void</span> <samp id="yellow">main</samp><span id="white">(String[] args) {</span></p>
                 <h1><span id="white3">System.</span><span id="purple">out</span><span id="white">.println(</span><span id="green">"Статья <span id="orange"> \" </span> <?php echo $titleart ?> <span id="orange"> \" </span> из рубрики: <?php echo $rubric ?>"</span><span id="white">)</span><span id="orange">;</span></h1>
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
                            <div id="contentt"><div >
                                <?php  echo "<h2>".$titleart."</h2><br>";
                                echo 
                                

                               
<<<CONTENT
                              
                    $content
    
CONTENT;
?>  
                                    <h1 id="readCom">Читайте комментарии...</h1>                               
</div>   
                                
<?php
     $result = mysql_query("SELECT * FROM comment WHERE articles='$identificator'");
     while ($col = mysql_fetch_array($result)){
         $nameC = $col['name'];
         $comment = $col['text']; 
         $date = $col['date'];
echo <<<COMMENT
         
         <div id="comment">
         <ul><li><h1 style="font-weight: bold;
    color: #9876AA;"><span style="color:black; font-weight: normal;">Оставил(а): </span> $nameC</h1></li><li><h1 style="font-weight: bold;
    color: #9876AA;">$date</h1></li></ul>         
            <p>$comment</p>
         </div>
        <br>
COMMENT;
     } 
                            
 ?>
                                <br>
        <form action="articlesConmmentInsert.php" method="POST">
        <table>
            <tr><td><h4 style="font-weight: bold;
    color: #CC7832;">Имя:</h4><input type="hidden" name="articlesC" value="<?php echo $identificator; ?>" />              
              <input name="nameC" /></td></tr>
          <tr><td><h4 style="font-weight: bold;
    color: #CC7832;">E-mail:</h4>
              <input name="emailC" /></td></tr>
          <tr><td><h4 style="font-weight: bold;
    color: #CC7832;">Комментарий: </h4>
              <textarea name="comment"></textarea></td></tr>  
          <tr><td><button id="combtn" type="submit">Добавить</button></td></tr>         
        </table>
            <br>
    </form>
                                
                            
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