<?php
session_start();

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
            <h3 class="section__suptitle">Добавить свою компанию</h3>
            <div class="section__text">
                Заполните поля отправки
            </div>

            <form action="pokupbdAdd.php" class="login100-form validate-form" method="post">
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="mystyle2" type="number" name="code_pok" placeholder="Код покупателя">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                </div>

                <div class="">
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="mystyle2" type="text" name="name_pok" placeholder="Название компании">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>


                <div class="">
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="mystyle2" type="text" name="address" placeholder="Адрес">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="mystyle2" type="text" name="phone_num" placeholder="Номер телефона">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" href="pokupbdAdd.php">
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
