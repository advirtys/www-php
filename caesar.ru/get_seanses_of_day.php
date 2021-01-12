
<seanses> 
    
<?php
if(isset($_GET["dayOfWeek"])){
            $dayOfWeek = $_GET["dayOfWeek"];
        }
require 'db_connect.php';
$db = new DB_CONNECT();
 mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
$result = mysql_query("SELECT * FROM ".$dayOfWeek) or die(mysql_error());
    while ($row = mysql_fetch_array($result)){       
        echo "<seans id =\"".$row["id"]."\"\n"; 
        echo "filmTitle =\"".$row["filmTitle"]."\"\n";
        $result2 = mysql_query("SELECT * FROM films WHERE id = ".$row["filmId"]) or die(mysql_error());
    while ($row2 = mysql_fetch_array($result2)){       
        
        
        echo "description = \"".$row2["description"]."\"\n";
        echo "genre = \"".$row2["genre"]."\"\n";
        echo "img = \"".$row2["img"]."\"\n";
        echo "length = \"".$row2["time"]."\"\n";
        echo "year = \"".$row2["year"]."\"\n";      
        echo "\n\n";
        
        
    }
         
        echo "date =\"".$row["date"]."\"\n"; 
        echo "time =\"".$row["time"]."\"\n";              
        echo "/>\n\n";
        
        
    }
?>
</seanses>
