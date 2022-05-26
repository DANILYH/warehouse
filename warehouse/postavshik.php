<?php
session_start();
require_once 'reg/connect.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include "head.html"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  type="text/javascript" src="js/myscript.js"></script>
    <meta http-equiv="content-script-type" content="text/javascript" />
</head>

<body>
<?php include "header.php"; ?>
<div class="section">
    <div class="container">

        <div class="section__header">
            <h3 class="section__suptitle">Поставить товар на склад</h3>
            <div class="section__text">                  
                     Заполните поля отправки
                      </div>
                    
         <form action="postavshikbd.php" class="login100-form validate-form" method="post">
                       <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="mystyle2" type="number" name="code_tov" placeholder="Код товара">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                                <select name="post" class="mystyle">
    <option value="0">Поставщик</option>
<?php
                 $sql=$connect->query("SELECT `id_post`, `name_post` FROM `post`");  
while($row = $sql->fetch_assoc()){
    echo '<option value="'.$row['id_post'].'">'.$row['name_post'].'</option>';
}                         


?> 
</select>
             <div class="ot">
        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="mystyle2" type="text" name="name_tov" placeholder="Название товара">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
             </div>

            <select name="ed_izm" class="mystyle">
            <option value="0">Единицы измерения</option>
<?php
                 $sql=$connect->query("SELECT `id_ed`, `ed_izm` FROM `ed_iz`");
echo $sql1;
while($row= $sql->fetch_assoc()){
    echo '<option value="'.$row['id_ed'].'">'.$row['ed_izm'].'</option>';
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
        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="mystyle2" type="number" name="cena_pok" placeholder="Цена продажи">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
        <div class="container-login100-form-btn">
                        <button class="login100-form-btn" onclick="myFunction()" href="postavshik.php">
                    Отправить
                    </button>
                    </div>
    </form>


        </div>
    </div>
</div>
    </section>

</body>
</html>
