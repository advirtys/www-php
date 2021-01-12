<?php

if(isset($_GET['db'])){
  $base = $_GET['db'];
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
}

include 'connection.php';
mysql_query("DELETE FROM `$base` WHERE id='$id'");


echo "<h1 id='addFilm'>Киносеанс успешно удален!"
             . "</h1>";
            
?>

