<?php
session_start();
require_once 'reg/connect.php';
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
	header("Content-Disposition: attachment;filename=".date("d-m-Y")."-товары на складе.xls");
	header("Content-Transfer-Encoding: binary ");
// !! Шапка хтмл
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="author" content="zabey" />
		<title>История сделок</title>
	</head>
	<body>';
// !!! Таблица с данными
    error_reporting(0); //вырубил ошибку о том, что не авторизован
    if((!$_COOKIE['user']) != ''):

              echo '
         <h2>
             <font style="vertical-align: inherit;"> Вы не авторизованы, доступ запрещен.</font>
         </h2>';
                else:
               echo '<div class="limiter">
        <div class="container-login100">
            <div class="auth">
                <table class="table table-striped" cellspacing="5" width="100%" >
                  </table>



                   <h2>Товары на складе:</h2>';

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
                echo "</table>";
       endif;
echo '</body></html>';
?>