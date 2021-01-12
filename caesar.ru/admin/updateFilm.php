<!DOCTYPE html>



<html>
    <head>
        <title>Редактировать фильм</title>
        <meta charset="UTF-8"/>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <form  action="updateFilmAction.php" method="post">
            
            <h4>Редактировать фильм</h4>
            <table>
            <?php
            if (isset($_POST['submit'])){

             if(isset($_POST['id'])){
                $id = $_POST['id'];
             }             
             }
           
            include 'connection.php';
            
           
            mysql_query("SET NAMES 'utf8'"); 
            mysql_query("SET CHARACTER SET 'utf8'");
            mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
            $result = mysql_query("SELECT * FROM films WHERE id='$id'") or die(mysql_error());
                while ($row = mysql_fetch_array($result)){  
                    echo "<input id='addFilmInput' name='id' type='hidden' value='".$row['id']."'/>";
                    echo "<tr>
                    <td><label>Название: </label></td>
                    <td><input id='addFilmInput' name='title' value='".$row['title']."'></td>
                    </tr>";
                    
                    echo "<tr>
                    <td><label>Жанр: </label></td>
                    <td><input id='addFilmInput' name='genre' value='".$row['genre']."'></td>
                </tr>";
                    
                    echo "<tr>
                    <td><label>Год: </label></td>
                    <td>";
                    
                    $a = getdate(); 
                    $n = $a['year'];
            
                        echo "<select name='year'>";
                        echo "<option  >".$row['year']."</option>";
                        for ($i=$n; $i > 1950; $i--){
                        echo "<option  >".$i."</option>";
                        }
                        echo "</select>";
                        
                        echo "</td>
                </tr>
                <tr>
                    <td><label>Продолжительность:</label></td>
                    <td>";
                         echo "<select name='time'>";
                         echo "<option >".$row['time']."</option>";
 for ($i=1; $i < 60; $i++){
     if ($i < 10){
         $r = "00:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "00:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "01:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "01:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "02:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "02:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "03:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "03:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "04:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "04:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "05:0".$i;
     echo "<option >".$r."</option>";
     } else {
         $r = "05:".$i;
     echo "<option >".$r."</option>";
     }
     
 }
 
 echo "</select></td>
                </tr>";
 
 echo "<tr> <td><label>URL картинки <br>
                            (Желательно с kinopoisk.ru):</label></td>
                    <td><input id='addFilmInput' name='img' value='".$row['img']."'></td>
                </tr>";
 echo "<tr>
                    <td><label>Описание фильма: </label></td>
                    <td><textarea name='description'>".$row['description']."</textarea></td>
                </tr>";
 
                } 
            
            
                
                
                
            
            

            
            
           
            ?>
                
                
            </table>
            <button name="submit" type="submit" >Сохранить!</button>
            
            
            
            
            
            
        </form>
    </body>        
</html>
