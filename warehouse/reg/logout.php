<?php
    session_start();
    unset($_SESSION['user']);

    setcookie('user', $user['name'], time() - 3600, "/");
    header('Location: /kursach/index.php')
?>