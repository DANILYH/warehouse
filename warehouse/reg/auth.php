<?php
    session_start();
    require_once 'connect.php';
    $name = filter_var(trim($_POST['name']), 
     FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
     FILTER_SANITIZE_STRING);

    $pass = md5($pass);
    $result = $connect->query("SELECT * FROM `users` WHERE `name` = '$name' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        echo "Такой пользователь не найден";
       exit();
    }
    $_SESSION['user'] = ["name" => $user['name']];
    header('Location: /kursach/index.php');
    setcookie('user', $user['name'], time() + 3600, "/");

    $mysql->close();

?>