<?php
include_once "../model/data_base.php";
session_start();

//var_dump($_POST);
//var_dump($_FILES['file']['type']);


//var_dump($_FILES);
//die();

$fileType = $_FILES['file']['type'];
//var_dump($fileType);
//die();

$substrFileType = substr(strrchr($fileType, "/"), 1);
//var_dump($substrFileType);
//die();

$post = $_POST;
$idOfUser = $post['id'];
$userName = $post['name'];
$userSurname = $post['surname'];
$userEmail = $post['email'];
$userPassword = $post['password'];
$userPicture =  $idOfUser . '.' . $substrFileType;

//var_dump($idOfUser);
//var_dump($userPicture);
//die();
//var_dump($idOfUser, $userName, $userSurname, $userEmail, $userPassword, $userPicture);
//die();

if (isset($_FILES) && !empty($_FILES)) {
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        move_uploaded_file($_FILES['file']['tmp_name'], "../images/$userPicture");
        $update = queryDb(
                    "UPDATE `task`
                            SET f_name = '$userName', 
                            l_name = '$userSurname', 
                            e_mail = '$userEmail' ,
                            pass = '$userPassword',
                            picture = '$userPicture'  
                            WHERE id = '$idOfUser'"
        );
        $_SESSION['user_info'][0]['f_name'] = $userName;
        $_SESSION['user_info'][0]['l_name'] = $userSurname;
        $_SESSION['user_info'][0]['e_mail'] = $userEmail;
        $_SESSION['user_info'][0]['pass'] = $userPassword;
        $_SESSION['user_info'][0]['picture'] = $userPicture;
    }
}
return true;
?>


