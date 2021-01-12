<?php
function if_admin($login, $pass){ // проверяет пользователя, является ли он администратором
    if(!mysql_connect("localhost","makc","123456789")) // подключение в БД
          die('Ошибка при подключении к базе данных #1'); //ошибка 1 - ошибка подключения
    elseif(!mysql_select_db("caesar"))
          die('Ошибка при подключении к базе данных #2'); //ошибка 2 - ошибка выбора базы данных
    $result = mysql_fetch_array(mysql_query("SELECT * FROM admins WHERE login='".$login."'"));
    if($result){
        if($result['pass'] == md5($pass)){
            return true;
        }
    } 
    else{
        return false;
    }
}
if (isset($_GET['login'])){
   $l = $_GET['login'];
}
if (isset($_GET['pass'])){
    $p = $_GET['pass'];
}

include 'connection.php';
            mysql_query("SET NAMES 'utf8'"); 
                 mysql_query("SET CHARACTER SET 'utf8'");
                 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
                 
                 
?>

<?php
if(if_admin($l, $p)){
echo <<<ADMIN
<!DOCTYPE html>

<html>
    <head>
        <title>Добавить киносеанс</title>
        <meta charset="UTF-8"/>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        
        <form  action="addSeansAction.php" method="post">
            <h4>Добавить киносеанс</h4>
            <table>
                
                <tr>
                    <td><label>Дата: </label></td>
                    <td>
ADMIN;
?><?php
                    
            $a = getdate(); 
            $n = $a['day'];
            
            
 for ($i=0; $i < 7; $i++){
     $dd = date('Y-m-d', strtotime('+'.$i.' day'));
     $date = explode("-", $dd);
     $date = date('D', mktime(0, 0, 0, $date[1], $date[2], $date[0]));
     if($date=="Mon"){  
         $date = "Пн";
     echo "<input type='radio' name='date' value='". $dd ."'/>".$date;
     } 
     if($date=="Tue"){  
         $date = "Вт";
     echo "<input type='radio' name='date' value='". $dd ."'/>".$date;
     }
     if($date=="Wed"){  
         $date = "Ср";
     echo "<input type='radio' name='date' value='". $dd ."'/>".$date;
     } 
     if($date=="Thu"){  
         $date = "Чт";
     echo "<input type='radio' name='date' value='". $dd ."'/>".$date;
     }
     if($date=="Fri"){  
         $date = "Пт";
     echo "<input type='radio' name='date' value='". $dd ."'/>".$date;
     } 
     if($date=="Sat"){  
         $date = "Сб";
     echo "<input type='radio' name='date' value='". $dd ."'/>".$date;
     }     
     if($date=="Sun"){  
         $date = "Вс";
     echo "<input type='radio' name='date' value='". $dd ."'/>".$date;
     }
     
 }
 echo "</td>
                </tr>
                <tr>
                    <td><label>Начало в:</label></td>
                    <td>";
            
            
            
            echo "<select name='hour'>";
 for ($i=0; $i < 24; $i++){
     if ($i < 10){
         $r = "0".$i;
     echo "<option >".$r."</option>";
     } else {
        
     echo "<option >".$i."</option>";
     }
     
 }
 
 
 echo "</select>";
 echo " часов ";
 echo "<select name='minutes'>";
 for ($i=0; $i < 60; $i++){
     if ($i < 10){
         $r = "0".$i;
     echo "<option >".$r."</option>";
     } else {
        
     echo "<option >".$i."</option>";
     }
     
 }
 
 echo "</select>";
 echo " минут";
 echo "</td>
                </tr>
                
                <tr>                    
                    
                    <td><label>Выберете фильм: </label></td>
                    <td>
                         "; 
                    mysql_query("SET NAMES 'utf8'"); 
                    mysql_query("SET CHARACTER SET 'utf8'");
                    mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
                    $result = mysql_query("SELECT * FROM films");
                    while ($row = mysql_fetch_array($result)){
                      
                   echo "<p><input name='filmId' type='radio' value=".$row['id'].">".$row['title']."</p>";  
                   
                    }
                    ?>
                    <?php                    echo <<<ADMIN
                    </td>
                    
                </tr>
                
                
                
                
            </table>
            <br>
            <button name="submit" type="submit" >Добавить!</button>
            
            
            
            
            
            
        </form>
    </body>        
</html>
ADMIN;
}
else{
    echo <<<ADMIN
    <!DOCTYPE html>

<html>
    <head>
        <title>Админ панель</title>
        <meta charset="UTF-8"/>
        <link href="style.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <form action="index.php?login=login&pass=pass" >
            <label>Логин:</label>
            <input name="login"/>
            <label>Пароль:</label>
            <input name="pass"/>
            <button type="submit">Вход</button>
        </form>
    </body>        
</html>
ADMIN;
}

?>
