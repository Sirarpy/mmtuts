<?php

error_reporting(E_ALL);
include_once "../model/data_base.php";
//------------------------------variables------------------------

$email = $_POST['email'];
$password = $_POST['password'];

//var_dump($email);

//------------------------------function-----------------------------

function checkLogin($email, $password)
{
    $result = queryDb("SELECT * FROM `task` WHERE `e_mail` = '$email' AND `pass` = '$password'");
    $user = assocDb($result);
    if (count($user)) {
        session_start();
        $_SESSION['user_info'] = $user;
        header("Location:../view/account.php");
    } else {
        header("Location:../view/login.php?sms=Please register");
    }
}

//------------------------------call function----------------------------

checkLogin($email, $password);

?>