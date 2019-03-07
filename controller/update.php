<?php
error_reporting(E_ALL);
include_once "../model/data_base.php";

echo "<pre>";
//var_dump($_POST);
//die();
//var_dump($_FILES);

$picture = $_FILES['articlePicture']['type'];

$substrFileType = substr(strrchr($picture, "/"), 1);
$article = $_POST;

//var_dump($article['id']);
//var_dump($substrFileType);
//die();

$idOfArticle = $article['id'];
$articleTitle = $article['articleTitle'];
$articleContent = $article['articleContent'];

//var_dump($idOfArticle);
//die();

$articlePicture =  $idOfArticle . '.' . $substrFileType;
//var_dump($articlePicture);
//die();
if (isset($_FILES) && !empty($_FILES)) {
    if (0 < $_FILES['articlePicture']['error']) {
        echo 'Error: ' . $_FILES['articlePicture']['error'] . '<br>';
    } else {
        move_uploaded_file($_FILES['articlePicture']['tmp_name'], "../images/title_images/$articlePicture");
        $update = queryDb(
            "UPDATE `articles`
                            SET title = '$articleTitle', 
                            article = '$articleContent', 
                            picture = '$articlePicture'  
                            WHERE id = '$idOfArticle'"
        );
    }
}
return true;
