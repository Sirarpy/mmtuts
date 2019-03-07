<?php
include_once "../model/data_base.php";

//var_dump($_POST);
//var_dump($_FILES);
//    var_dump($article_id);
//    die();

    $article_id = $_POST['id'];
    //$picture = assocDb(queryDb("SELECT `picture` FROM articles WHERE id = '$article_id'"))[0];
    //unlink("..images/title_images/".$picture);
    $deleteArticle = queryDb("DELETE FROM articles WHERE id = '$article_id'");





