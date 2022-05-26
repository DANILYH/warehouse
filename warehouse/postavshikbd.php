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
           error_reporting(0); //вырубил ошибку о том, что в бд null

                    $kol = filter_var(trim($_POST['kol']),
                                       FILTER_SANITIZE_NUMBER_INT);
                    $cena_pok = filter_var(trim($_POST['cena_pok']),
                                         FILTER_SANITIZE_NUMBER_INT);
                    $code_tov = filter_var(trim($_POST['code_tov']),
                                        FILTER_SANITIZE_NUMBER_INT);
                    $name_tov = filter_var(trim($_POST['name_tov']),
                                       FILTER_SANITIZE_STRING);
                    $id_post = filter_var(trim($_POST['post']),
                                      FILTER_SANITIZE_STRING);
                    $id_ed = filter_var(trim($_POST['ed_izm']),
                                         FILTER_SANITIZE_STRING);
                     if ($kol == null || $cena_pok == null || $code_tov == null || $name_tov == null || $id_post == 0 || $id_ed == 0) {echo "<div class='section__text'>Некорректно заполнены поля ввода</div>";}
                     else {
                    $sql=$connect->query("SELECT `id_post`,`code_post` FROM `post` WHERE `id_post` = '$id_post'");
                    $sql1=$connect->query("SELECT `id_ed`,`ed_izm` FROM `ed_iz` WHERE `id_ed` = '$id_ed'");
                    $sql2=$connect->query("SELECT * FROM `tovar_skl` where  `code_tov`='$code_tov'");
                    $sql3=$connect->query("SELECT * FROM `tovar_skl` where  `code_tov`='$code_tov'");
                    $tovar_skl = $sql2->fetch_assoc();
                    $code_t=$sql3->fetch_assoc();
                    $cena_prod=$cena_pok*1.3;
                    $code_post1 = $sql->fetch_assoc();
                    $ed_i = $sql1->fetch_assoc();
                    if ($code_t['code_tov']!=$code_tov){
                    $code_post=$code_post1['code_post'];
                    $ed_izm=$ed_i['ed_izm'];
                    $connect->query("INSERT INTO `tovar_skl` ( `code_tov`,`code_post`,`name_tov`, `ed_izm`, `kol`, `cena_pok`, `cena_prod`) VALUES( '$code_tov','$code_post','$name_tov', '$ed_izm', '$kol', '$cena_pok', '$cena_prod')");
                    echo "<div class='section__text'>
                     Вы добавили свой товар
                      </div>";
                    }
                    else{
                    $kol1=$tovar_skl['kol']+$kol;
                    $connect->query("UPDATE tovar_skl SET kol = '$kol1', cena_pok='$cena_pok', cena_prod='$cena_prod' WHERE code_tov = '$code_tov'");
                                                echo "<div class='section__text'>
                     Количество товара и цена продажи обновлена
                      </div>";
                    }
                }


                    ?>
        </div>
               </div>
    </section>

</body>
</html>
