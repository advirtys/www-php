<?php include 'phpmain/connection.php';
 if ($_GET['id']){
     $id = $_GET['id'];
 }
  mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
 $result = mysql_query("SELECT * FROM pages WHERE id='$id'");
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
                    <span id="orange">class</span> <span id="white"><?php echo $title ?> {</span><br>
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
                            <div id="contentt"><div><?php echo 
<<<CONTENT
                     
                    
                    $content
                                   
CONTENT;
                            
 ?></div>
                            
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
