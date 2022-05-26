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
<div class="section">
    <div class="container">

        <div class="section__header">
           <?php        
                    error_reporting(0);
                    $code_post = filter_var(trim($_POST['code_post']),
                                        FILTER_SANITIZE_NUMBER_INT);
                    $name_post = filter_var(trim($_POST['name_post']),
                                       FILTER_SANITIZE_STRING);
                    $address = filter_var(trim($_POST['address']),
                                        FILTER_SANITIZE_STRING);
                    $phone_num = filter_var(trim($_POST['phone_num']),
                                      FILTER_SANITIZE_STRING);
                    $sql=$connect->query("SELECT `id_post`,`code_post` FROM `post` WHERE `code_post` = '$code_post'");
                    $code_p =$sql->fetch_assoc();
                    if ($code_post == null || $name_post == null || $address == null || $phone_num == null) {echo "<div class='section__text'>Вы ничего не ввели</div>";}
                    else {
                        if ($code_p['code_post'] != $code_post) {
                            $connect->query("INSERT INTO `post` ( `code_post`,`name_post`,`address`, `phone_num`) VALUES( '$code_post','$name_post','$address', '$phone_num')");
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