<?php

error_reporting(E_ALL);
include_once "../model/data_base.php";

//------------------------variables--------------------

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$rep_password = $_POST['rep_password'];


//------------------------checking registration function---------------------

function checkReg($name, $surname, $email, $password, $rep_password)
{
    if (strlen($password) <= 3) {
        die(header("Location:../view/registration.php?sms=Password must include more than 6 symbols"));
    }
    if ($password !== $rep_password) {
        die(header("Location:../view/registration.php?sms=Passwords are not match"));
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(header("Location:../view/registration.php?sms=Email is not correct"));
    }
    $query = queryDb("SELECT * FROM task WHERE `e_mail` = '$email'");
    $email_query = assocDb($query);
    if (count($email_query) > 0) {
        die(header("Location:../view/registration.php?sms=email already exists"));
    }
    if (strlen($name) == "" || strlen($surname) == "" || strlen($email) == ""
        || strlen($password) == "" || strlen($rep_password) == "") {
        die(header("Location:../view/registration.php?sms=All areas must be filled"));
    }
    $result = queryDb("INSERT INTO task(`f_name`, `l_name`, `e_mail`, `pass`, `picture` ) 
   VALUES  ('$name', '$surname', '$email', '$password', 'user.png')");

    header("Location:../view/login.php");
}

//------------------------------call function----------------------------

checkReg($name, $surname, $email, $password, $rep_password);

?>