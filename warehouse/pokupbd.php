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

                    $kol_prod = filter_var(trim($_POST['kol']), 
                                       FILTER_SANITIZE_NUMBER_INT);
                    $id_tov = filter_var(trim($_POST['id_tov']), 
                                       FILTER_SANITIZE_STRING);
                    $id_pok = filter_var(trim($_POST['id_pok']), 
                                      FILTER_SANITIZE_STRING);
                     if ($kol_prod == null ||$kol_prod == 0 || $id_tov == 0 || $id_pok == 0) {echo "<div class='section__text'>Некорректно заполнены поля ввода</div>";}
                     else {
                    $sql=$connect->query("SELECT `name_pok`,`code_pok` FROM `pokup` WHERE `id_pok` = '$id_pok'");
                    $pokup = $sql->fetch_assoc();
                    $sql1=$connect->query("SELECT * FROM `tovar_skl` WHERE `id_tov` = '$id_tov'");
                    $tovar_skl = $sql1->fetch_assoc();
                    if ($tovar_skl['kol']>=$kol_prod){
                    $code_pok=$pokup['code_pok'];
                    $code_tov=$tovar_skl['code_tov'];
                    $code_post=$tovar_skl['code_post'];
                    $cena_pok=$tovar_skl['cena_pok'];
                    $ed_izm=$tovar_skl['ed_izm'];
                    $pribil=$cena_pok*0.3*$kol_prod;
                    $kol=$tovar_skl['kol']-$kol_prod;
                    $connect->query("INSERT INTO `sdelki` ( `code_tov`,`code_post`,`code_pok`, `kol_prod`,`ed_izm`, `pribil`) VALUES( '$code_tov','$code_post','$code_pok', '$kol_prod','$ed_izm', '$pribil')");
                    $connect->query("UPDATE tovar_skl SET kol = '$kol' WHERE id_tov = '$id_tov'");
                        echo "<div class='section__text'>                  
                     Заказ оформлен
                      </div>";
                     $sql2=$connect->query("SELECT * FROM `tovar_skl` WHERE `id_tov` = '$id_tov'");
                     $tovar_skl = $sql2->fetch_assoc();
                     if ($tovar_skl['kol']==0){
                     $result = "DELETE FROM tovar_skl WHERE kol=0";
                     $connect->query($result);
                     }
                    }
                    else {
                        echo "<div class='section__text'>                  
                     Товар закончился или вы указали больше доступного
                      </div>";
                    }
                }

                    ?> 
                            </div>
               </div>
    </section>
</body>
</html>

