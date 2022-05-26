<?php
session_start();
require_once 'reg/connect.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include "head.html"; ?>
</head>

<body>
<?php
    error_reporting(0); //вырубил ошибку о том, что не авторизован
    include "header.php";
    if((!$_COOKIE['user']) != ''):
    ?>
               <br><br><br><br>
         <h2>
             <font style="vertical-align: inherit;"> Вы не авторизованы, доступ запрещен. Чтобы авторизоваться нажмите <a href="reg/index.html">ЗДЕСЬ</a></font>
         </h2>
                <?php else: ?>
           <div class="limiter">
        <div class="container-login100">
            <div class="auth">                            
                <table class="table table-striped" cellspacing="5" width="100%" >
                  </table>  
                    
                    
                    
                   <h2>Товары на складе:</h2> 
                    
                    
     
                <?php  
$sql = "SELECT * FROM `tovar_skl`"; 
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) { 
                    echo '<table border=1 cellspacing="3"><tr><th  class="table-striped">ID товара</th><th  class="table-striped">Код товара</th><th  class="table-striped">Код поставщика</th><th  class="table-striped">Наименование товара</th><th  class="table-striped">Единица измерения</th><th  class="table-striped">Количество</th><th  class="table-striped">Цена покупки</th><th  class="table-striped">Цена продажи</th></tr>';

      // output data of each row 
    while($row = $result->fetch_assoc()) { 

      echo "<tr><td>" . $row["id_tov"]
        . "</td><td>" . $row["code_tov"] 
        . "</td><td>" . $row["code_post"]
        . "</td><td>" . $row["name_tov"]
        . "</td><td>" . $row["ed_izm"]
        . "</td><td>" . $row["kol"]
        . "</td><td>" . $row["cena_pok"]
        . "</td><td>" . $row["cena_prod"]
        . "</td></tr>"; 
    }  
                    }
                echo "</table><br>";
                echo "<a href='dtov.php'>Скачать таблицу</a>";
       endif         ?>
                <br>
</body>
</html>
