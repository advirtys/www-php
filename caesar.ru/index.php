
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Цезарь кинотеатр-расписание</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body><div id="wrapper">
        <div id="logo"></div>
        <div id="seansesWrapper"></div>
        <div id="seansesList">
            <p id="dayMon">Понидельник</p>
        <table id="tableSeanses">            
            <tr><td id="labels">Название фильма</td>
        <td id="labels">Дата</td>
        <td id="labels">Начало</td>
            <td id="labels">Описание фильма</td></tr>
        <?php
require 'db_connect.php';
$db = new DB_CONNECT();
 mysql_query("SET NAMES 'utf8'"); 
 mysql_query("SET CHARACTER SET 'utf8'");
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
$result = mysql_query("SELECT * FROM Mon") or die(mysql_error());
    while ($row = mysql_fetch_array($result)){       
        echo "<tr><td>".$row["filmTitle"]."</td>";
        echo "<td>".$row["date"]."</td>";
        echo "<td>".$row["time"]."</td>";
        echo "<td><a href='description.php?filmId=".$row["filmId"]."' target='_blank'>подробнее о фильме...</a></td></tr>";                
    }
?>
         </table>
            <table id="tableSeanses">
            <p id="dayOfWeek">Вторник</p>
            <tr><td id="labels">Название фильма</td>
        <td id="labels">Дата</td>
        <td id="labels">Начало</td>
            <td id="labels">Описание фильма</td></tr>
        <?php
$result2 = mysql_query("SELECT * FROM Tue") or die(mysql_error());
    while ($row2 = mysql_fetch_array($result2)){       
        echo "<tr><td>".$row2["filmTitle"]."</td>";
        echo "<td>".$row2["date"]."</td>";
        echo "<td>".$row2["time"]."</td>";
        echo "<td><a href='description.php?filmId=".$row2["filmId"]."' target='_blank'>подробнее о фильме...</a></td></tr>";                
    }
?>
         </table>
            
            
            <table id="tableSeanses">
            <p id="dayOfWeek">Среда</p>
            <tr><td id="labels">Название фильма</td>
        <td id="labels">Дата</td>
        <td id="labels">Начало</td>
            <td id="labels">Описание фильма</td></tr>
        <?php
$result3 = mysql_query("SELECT * FROM Wed") or die(mysql_error());
    while ($row3 = mysql_fetch_array($result3)){       
        echo "<tr><td>".$row3["filmTitle"]."</td>";
        echo "<td>".$row3["date"]."</td>";
        echo "<td>".$row3["time"]."</td>";
        echo "<td><a href='description.php?filmId=".$row3["filmId"]."' target='_blank'>подробнее о фильме...</a></td></tr>";                
    }
?>
         </table>
            
            
            <table id="tableSeanses">
            <p id="dayOfWeek">Четверг</p>
            <tr><td id="labels">Название фильма</td>
        <td id="labels">Дата</td>
        <td id="labels">Начало</td>
            <td id="labels">Описание фильма</td></tr>
        <?php
$result4 = mysql_query("SELECT * FROM Thu") or die(mysql_error());
    while ($row4 = mysql_fetch_array($result4)){       
        echo "<tr><td>".$row4["filmTitle"]."</td>";
        echo "<td>".$row4["date"]."</td>";
        echo "<td>".$row4["time"]."</td>";
        echo "<td><a href='description.php?filmId=".$row4["filmId"]."' target='_blank'>подробнее о фильме...</a></td></tr>";                
    }
?>
         </table>
            
            <table id="tableSeanses">
            <p id="dayOfWeek">Пятница</p>
            <tr><td id="labels">Название фильма</td>
        <td id="labels">Дата</td>
        <td id="labels">Начало</td>
            <td id="labels">Описание фильма</td></tr>
        <?php
$result5 = mysql_query("SELECT * FROM Fri") or die(mysql_error());
    while ($row5 = mysql_fetch_array($result5)){       
        echo "<tr><td>".$row5["filmTitle"]."</td>";
        echo "<td>".$row5["date"]."</td>";
        echo "<td>".$row5["time"]."</td>";
        echo "<td><a href='description.php?filmId=".$row5["filmId"]."' target='_blank'>подробнее о фильме...</a></td></tr>";                
    }
?>
         </table>
            
            <table id="tableSeanses">
            <p id="dayOfWeek">Суббота</p>
            <tr><td id="labels">Название фильма</td>
        <td id="labels">Дата</td>
        <td id="labels">Начало</td>
            <td id="labels">Описание фильма</td></tr>
        <?php
$result6 = mysql_query("SELECT * FROM Sat") or die(mysql_error());
    while ($row6 = mysql_fetch_array($result6)){       
        echo "<tr><td>".$row6["filmTitle"]."</td>";
        echo "<td>".$row6["date"]."</td>";
        echo "<td>".$row6["time"]."</td>";
        echo "<td><a href='description.php?filmId=".$row6["filmId"]."' target='_blank'>подробнее о фильме...</a></td></tr>";                
    }
?>
         </table>
            
            <table id="tableSeanses">
            <p id="dayOfWeek">Воскресенье</p>
            <tr><td id="labels">Название фильма</td>
        <td id="labels">Дата</td>
        <td id="labels">Начало</td>
            <td id="labels">Описание фильма</td></tr>
        <?php
$result7 = mysql_query("SELECT * FROM Sun") or die(mysql_error());
    while ($row7 = mysql_fetch_array($result7)){       
        echo "<tr><td>".$row7["filmTitle"]."</td>";
        echo "<td>".$row7["date"]."</td>";
        echo "<td>".$row7["time"]."</td>";
        echo "<td><a href='description.php?filmId=".$row7["filmId"]."' target='_blank'>подробнее о фильме...</a></td></tr>";                
    }
?>
         </table>     
            
            </div>
        <div id="bgFooter"></div>
        </div>
    </body>
</html>
