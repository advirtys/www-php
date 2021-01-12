<!DOCTYPE html>
<html>
   
    <head>
        <title>Добавить фильм!</title>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        
         <?php
            
         
            if (isset($_POST['submit'])){

             if(isset($_POST['title'])){
                $title = $_POST['title'];
             }

             if(isset($_POST['genre'])){
                $genre= $_POST['genre'];
             }

             if(isset($_POST['year'])){
                $year= $_POST['year'];
             }

              if(isset($_POST['time'])){
                $time= $_POST['time'];
             }

             if(isset($_POST['img'])){
                $img= $_POST['img'];
             }

             if(isset($_POST['description'])){
                $description= $_POST['description'];
             }
            }
            if ($title != NULL && $genre != NULL && $img != NULL && $description != NULL){
                
               
                
                include 'connection.php';
                 mysql_query("SET NAMES 'utf8'"); 
                 mysql_query("SET CHARACTER SET 'utf8'");
                 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
                 $result = mysql_query("INSERT INTO films (title, description, genre, img, time, year) VALUES
(
'$title',
'$description',
'$genre',
'$img',
'$time',
'$year')") or die(mysql_error());
                 
                 if ($result==TRUE){
                     echo "<h1 id='addFilm'>Фильм успешно добавлен!"
             . "</h1>";
                 } 
                 
             
             
             } else {
                     echo "<h1 id='addFilm'>ОШИБКА!!!<br>Поля не могут быть пустыми! <br>Заполните все поля!</h1>";
                 }

?>
        
    </body>
</html>

