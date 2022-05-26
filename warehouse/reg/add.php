<?php
    session_start();
require_once 'reg/connect.php';
    
    $message = $_POST['message'];

    $ses = $_COOKIE['user'];
    
    if (mb_strlen($message) < 10 || mb_strlen($message) > 10000) {
        echo "Количество символов должно быть от 10 - 100";
    }
    else  
    {  
    
    

        $connect->query("INSERT INTO `reviews` ( `uname`, `text`) VALUES( '$ses', '$message')");
    }
    $connect->close();
    
    header('Location: sklad.php');
?>