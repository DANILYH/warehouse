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
<?php include "header.php"; ?>
<section class="section">
    <div class="container">
        <div class="section__header">
<?php
    error_reporting(0);
    $code_pok = filter_var(trim($_POST['code_pok']),
        FILTER_SANITIZE_NUMBER_INT);
    $name_pok = filter_var(trim($_POST['name_pok']),
        FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST['address']),
        FILTER_SANITIZE_STRING);
    $phone_num = filter_var(trim($_POST['phone_num']),
        FILTER_SANITIZE_STRING);
    $sql=$connect->query("SELECT `id_pok`,`code_pok` FROM `pokup` WHERE `code_pok` = '$code_pok'");
    $code_pokup =$sql->fetch_assoc();
    if ($code_pok == null || $name_pok == null || $address == null || $phone_num == null) {echo "<div class='section__text'>Вы ничего не ввели</div>";}
    else {
        if ($code_pokup['code_pok'] != $code_pok) {
            $connect->query("INSERT INTO `pokup` ( `code_pok`,`name_pok`,`address`, `phone_num`) VALUES( '$code_pok','$name_pok','$address', '$phone_num')");
            echo "<div class='section__text'>                  
                     Вы добавили свою компанию
                      </div>";
        } else {

            echo "<div class='section__text'>                  
                     Не удалось добавить
                      </div>";
        }
    }

?>
        </div>
    </div>
</section>
</body>
</html>
