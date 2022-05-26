<?php
    require_once 'connect.php';
    $name = filter_var(trim($_POST['name']),
     FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
     FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
     FILTER_SANITIZE_STRING);
    
    //$mail=mysqli_query($connect, "SELECT * FROM `users` ORDER BY `users`.`email` ASC");
    
    //if $mail=$email {
    //    echo "Данная почта уже зарегистрирована"
    //}
    
    if(mb_strlen($name) < 2 || mb_strlen($name) > 90) {
        echo "Недопустимая длина имени";
        exit();
    } else if(mb_strlen($email) < 5 || mb_strlen($email) > 90) {
        echo "Недопустимая длина почты";
        exit();
    } else if(mb_strlen($pass) < 5 || mb_strlen($pass) > 20) {
        echo "Недопустимая длина пароля";
        exit();
    } //else if

    $pass = md5($pass);


    $connect->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES('$name', '$email', '$pass')");
    $connect->close();

    header('Location: index.html');
?>
