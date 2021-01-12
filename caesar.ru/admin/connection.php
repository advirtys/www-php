<?php

$host = "localhost";
                $user = "makc";
                $password = "123456789";
                $db = "caesar";

                if (!$conn = mysql_connect($host, $user, $password))
                {
                echo "<h1>MySQL Error!</h1>";
                exit;
                }
                mysql_select_db($db);
                ?>
