<?php
session_start();
require_once 'reg/connect.php';
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
	header("Content-Disposition: attachment;filename=".date("d-m-Y")."-поставщики.xls");
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

           echo   '
        <h2>
            <font style="vertical-align: inherit;"> Вы не авторизованы, доступ запрещен.</font>
        </h2>';
 else:
           echo '<div class="limiter">
        <div class="container-login100">
            <div class="auth">
                <table class="table-striped" cellspacing="5" width="100%" >
                  </table>
                   <h2>Поставщики:</h2>';

$sql = "SELECT * FROM `post`";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                    echo '<table border=1 cellspacing="3"><tr><th class="table-striped">ID поставщика</th><th  class="table-striped">Код поставщика</th><th >Имя поставщика</th><th  >Адрес</th><th  class="table-striped">Номер телефона</th></tr>';

      // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<tr><td>" . $row["id_post"]
        . "</td><td>" . $row["code_post"]
        . "</td><td class='table-striped'>" . $row["name_post"]
        . "</td><td class='table-striped'>" . $row["address"]
        . "</td><td>" . $row["phone_num"]
        . "</td></tr>";
    }
                    }
                        echo "</table>";
        endif;
echo '</body></html>';
?>