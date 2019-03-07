<?php

session_start();

if (isset($_SESSION['user_info'])) {
    $user = $_SESSION['user_info'][0];
}else{
    header("Location:../view/login.php");
    die();
}