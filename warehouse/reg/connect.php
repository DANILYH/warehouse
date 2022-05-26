<?php
     $par1_ip="localhost";
     $par2_name="robin";
     $par3_pass="1";
     $par4_db="setprog";
     $connect = mysqli_connect($par1_ip, $par2_name, $par3_pass, $par4_db);
    
    if (!$connect) {
        die('Error connect to DataBase');
    }
?>

