
<!DOCTYPE html>
<html>
    <head>
        <title>Цезарь кинотеатр-описание фильма</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body><div id="wrapper">
        <div id="logo"></div>
        
            <div id="seansesWrapper"></div>
        <div id="seansesList">
            <br>
        <?php
        if(isset($_GET["filmId"])){
            $filmId = $_GET["filmId"];
        }
        require 'db_connect.php';
        $db = new DB_CONNECT();
         mysql_query("SET NAMES 'utf8'"); 
         mysql_query("SET CHARACTER SET 'utf8'");
         mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
        $result = mysql_query("SELECT * FROM films WHERE id = ".$filmId) or die(mysql_error());
        while ($row = mysql_fetch_array($result)){
        echo "<img id='imgLogo' src='".$row["img"]."' width='250'>";
        echo "<p id='desc'><span>Название: </span>".$row["title"]."</p>";
        echo "<p id='desc'><span>Жанр: </span>".$row["genre"]."</p>";
        echo "<p id='desc'><span>Год: </span>".$row["year"]."</p>";
        echo "<p id='desc'><span>Длительность: </span>".$row["time"]."</p>";
        echo "<br><br><br>";
        echo "<p id='description'>".$row["description"]."</p>";
        echo "<br><br><br><br><br>";
        }
            
?>
        
            </div>
        <div id="bgFooter"></div>
        </div>
        
    </body>
</html>
