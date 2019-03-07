<?php

include_once "../model/data_base.php";
session_start();

//var_dump($_POST);
//var_dump($_FILES);
//die();

$user_id = $_SESSION['user_info'][0]['id'];
$articleTitle = $_POST['article_title'];
$articleContent = $_POST['article_content'];
$articlePicture = time() . "." . substr(strrchr($_FILES['article_picture']['type'], "/"), 1);

//var_dump($user_id);
//var_dump($_FILES);
//die();

if (isset($_FILES) && !empty($_FILES)) {
    if (0 < $_FILES['article_picture']['error']) {
        echo 'Error: ' . $_FILES['article_picture']['error'] . '<br>';
    } else {
        move_uploaded_file($_FILES['article_picture']['tmp_name'], "../images/title_images/$articlePicture");
        $addArticle = queryDb("INSERT INTO articles (`title`, `article`, `picture`,`user_id`)  VALUES  ('$articleTitle', '$articleContent', '$articlePicture','$user_id')");
    }
}
//var_dump($addArticle);
//var_dump($addArticle);
//die();

return true;

?>