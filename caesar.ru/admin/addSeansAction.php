<!DOCTYPE html>
<html>
   
    <head>
        <title>Добавить киносеанс!</title>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        
         <?php
            
         
            if (isset($_POST['submit'])){
             
             
             if(isset($_POST['date'])){
                $date = $_POST['date'];
             }

             if(isset($_POST['hour'])){
                $hour= $_POST['hour'];
             }

             if(isset($_POST['minutes'])){
                $minutes= $_POST['minutes'];
             }

              if(isset($_POST['filmId'])){
                $filmId= $_POST['filmId'];
             }
             $time = $hour.":".$minutes;             
             $day = explode("-", $date);
             $day = date('D', mktime(0, 0, 0, $day[1], $day[2], $day[0]));
             
           
     
            }
            
            include 'connection.php';
           
                       mysql_query("SET NAMES 'utf8'"); 
                 mysql_query("SET CHARACTER SET 'utf8'");
                 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
                 
                 $result = mysql_query("SELECT title FROM films WHERE id='$filmId'");
                    while ($row = mysql_fetch_array($result)){
                        $title = $row['title'];
                        if($day == "Mon"){
                            
                        $result2 = mysql_query("INSERT INTO Mon (filmTitle, date, time, filmId) VALUES ('$title', '$date', '$time', '$filmId')");
                        
                        if ($result2==TRUE){
                     echo "<h1 id='addFilm'>Киносеанс успешно добавлен!"
             . "</h1>";
                 } else {
                     echo "Не добавлен";
                 }
                            
                    } else if($day == "Tue"){
                            
                        $result2 = mysql_query("INSERT INTO Tue (filmTitle, date, time, filmId) VALUES ('$title', '$date', '$time', '$filmId')");
                        
                        if ($result2==TRUE){
                     echo "<h1 id='addFilm'>Киносеанс успешно добавлен!"
             . "</h1>";
                 } else {
                     echo "Не добавлен";
                 }
                            
                    } else if($day == "Wed"){
                            
                        $result2 = mysql_query("INSERT INTO Wed (filmTitle, date, time, filmId) VALUES ('$title', '$date', '$time', '$filmId')");
                        
                        if ($result2==TRUE){
                     echo "<h1 id='addFilm'>Киносеанс успешно добавлен!"
             . "</h1>";
                 } else {
                     echo "Не добавлен";
                 }
                            
                    } else if($day == "Thu"){
                            
                        $result2 = mysql_query("INSERT INTO Thu (filmTitle, date, time, filmId) VALUES ('$title', '$date', '$time', '$filmId')");
                        
                        if ($result2==TRUE){
                     echo "<h1 id='addFilm'>Киносеанс успешно добавлен!"
             . "</h1>";
                 } else {
                     echo "Не добавлен";
                 }
                            
                    } else if($day == "Fri"){
                            
                        $result2 = mysql_query("INSERT INTO Fri (filmTitle, date, time, filmId) VALUES ('$title', '$date', '$time', '$filmId')");
                        
                        if ($result2==TRUE){
                     echo "<h1 id='addFilm'>Киносеанс успешно добавлен!"
             . "</h1>";
                 } else {
                     echo "Не добавлен";
                 }
                            
                    } else if($day == "Sat"){
                            
                        $result2 = mysql_query("INSERT INTO Sat (filmTitle, date, time, filmId) VALUES ('$title', '$date', '$time', '$filmId')");
                        
                        if ($result2==TRUE){
                     echo "<h1 id='addFilm'>Киносеанс успешно добавлен!"
             . "</h1>";
                 } else {
                     echo "Не добавлен";
                 }
                            
                    } else if($day == "Sun"){
                            
                        $result2 = mysql_query("INSERT INTO Sun (filmTitle, date, time, filmId) VALUES ('$title', '$date', '$time', '$filmId')");
                        
                        if ($result2==TRUE){
                     echo "<h1 id='addFilm'>Киносеанс успешно добавлен!". "</h1>";
                     
                 } else {
                     echo "Не добавлен";
                 }
                            
                    }
                    }
                    
           
                    
                 

?>
        
    </body>
</html>

