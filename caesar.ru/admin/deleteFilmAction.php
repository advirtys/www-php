<!DOCTYPE html>
<html>
   
    <head>
        <title>Удалить фильм!</title>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        
         <?php
            
         
            if (isset($_POST['submit'])){
             if(isset($_POST['id'])){
                $id = $_POST['id'];
             }               
            }
            
            
            if ($id != NULL){
                
               
                
                include 'connection.php';
                 mysql_query("SET NAMES 'utf8'"); 
                 mysql_query("SET CHARACTER SET 'utf8'");
                 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
                 $result = mysql_query("DELETE FROM films WHERE id  = '$id'") or die(mysql_error());
                 
                 if ($result==TRUE){
                     echo "<h1 id='addFilm'>Фильм успешно удален!"
             . "</h1>";
                 } 
                 
             
             
             } 

?>
        
    </body>
</html>

