<?php
session_start();
require_once 'reg/connect.php';
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
	header("Content-Disposition: attachment;filename=".date("d-m-Y")."-история сделок.xls");
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

                    echo '<h2>
                  <font style="vertical-align: inherit;"> Вы не авторизованы, доступ запрещен.</font>
              </h2>';
                                    else:
                              echo '<div class="limiter">
              <div class="container-login100">
                  <div class="auth">
                      <table class="table table-striped" cellspacing="5" width="100%" >
                        </table>

                       <h2>История сделок:</h2> ';
$sql = "SELECT * FROM `sdelki`";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                    echo '<table border=1 cellspacing="3"><tr><th  class="table-striped">ID сделки</th><th  class="table-striped">Код товара</th><th>Поставщик</th><th>Покупатель</th><th  class="table-striped">Единица измерения</th><th  class="table-striped">Количество</th><th  class="table-striped">Прибыль</th></tr>';
    $sum=0;
      // output data of each row
    while($row = $result->fetch_assoc()) {
            $code_post=$row['code_post'];
        $sql2 = "SELECT `name_post`,`code_post` FROM `post` where `code_post`='$code_post'";
                 $result2 = $connect->query($sql2);
          while($row2 = $result2->fetch_assoc()){
              $code_pok=$row['code_pok'];
$sql3 = "SELECT `name_pok`,`code_pok` FROM `pokup` where `code_pok`='$code_pok'";
                 $result3 = $connect->query($sql3);
              while($row3 = $result3->fetch_assoc()){
                echo "<tr><td>" . $row["id_sd"]
        . "</td><td>" . $row["code_tov"]
        . "</td><td class='table-striped'>" . $row2["name_post"]
        . "</td><td class='table-striped'>" . $row3["name_pok"]
        . "</td><td>" . $row["ed_izm"]
        . "</td><td>" . $row["kol_prod"]
        . "</td><td>" . $row["pribil"]
        . "</td></tr>";
               $sum=$sum+$row["pribil"];
              }
          }
    }
        echo "</table>";
                    }
                    else {
                        echo "Продаж еще не было";
                    }
        echo "<it>Всего прибыли: ".$sum."</it><br>";
        endif;
echo '</body></html>';
?>