<?php
session_start();
require_once 'reg/connect.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include "head.html"; ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  type="text/javascript" src="assets/js/myscript.js"></script>
    <meta http-equiv="content-script-type" content="text/javascript" />
</head>

<body>

<?php include "header.php"; ?>
   
           
            <div class="section">
    <div class="container">

        <div class="section__header">
            <h3 class="section__suptitle">Купить товар</h3>
            <div class="section__text">                  
                     Заполните поля для покупки
                      </div>
                    
         <form action="pokupbd.php" class="login100-form validate-form" method="post">

<div class="ot1">
<div id="preload" style="display:none" class="mystyle1">

<?php

    $sql=$connect->query("SELECT `id_tov`,`cena_prod` FROM `tovar_skl`");
 while($row = $sql->fetch_assoc()){
echo '
<div sklad="'.$row['id_tov'].'"><p class="cena">Цена за ед. товара: '.$row['cena_prod'].' рублей</p></div>';
    }
    ?>

</div>
<select onchange="load_sklad(this)" name="id_tov" class="mystyle">
    <option value="0">Товар</option>
<?php

                 $sql=$connect->query("SELECT `id_tov`,`name_tov` FROM `tovar_skl`"); 
while($row = $sql->fetch_assoc()){
 echo '<option value="'.$row['id_tov'].'">'.$row['name_tov'].'</option>';
}
     ?>  
                              </select>
                 </div>
<div id="sklad_info"></div>


             <select name="id_pok" class="mystyle">
    <option value="0">Покупатель</option>
<?php
                 $sql=$connect->query("SELECT `id_pok`, `name_pok` FROM `pokup`");  
while($row = $sql->fetch_assoc()){
    echo '<option value="'.$row['id_pok'].'">'.$row['name_pok'].'</option>';
}                         


?>  
</select>


<div class="ot">

        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="mystyle2" type="number" name="kol" placeholder="Количество">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
<div id="sklad_info"></div>

        <div class="container-login100-form-btn">
                        <button class="login100-form-btn" href="pokupbd.php">
                            Отправить
                        </button>
                    </div>
    </form>

        </div>
    </div>
            </div>
    </section>

</div>


</body>
</html>
