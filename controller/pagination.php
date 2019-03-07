<?php
include_once "../model/data_base.php";
$limitShow = 4;
$totalResult = queryDb("SELECT COUNT(id) FROM articles where user_id = '".$user['id']."' ");
$row = mysqli_fetch_row($totalResult);
$totalArticles = $row[0];
$totalPages = ceil($totalArticles / $limitShow);

//echo "<pre>";
//var_dump($totalPages);
//die();

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};

$start_from = ($page - 1) * $limitShow;
//echo "<pre>";
//var_dump($start_from);
//var_dump($limitShow);
//die();

//$sql = "SELECT * FROM articles BY id ASC LIMIT ".$start_from.",".$limitShow;
$sql = "SELECT * FROM articles where user_id = '".$user['id']."' LIMIT ".$start_from.",".$limitShow;
$rs_result = queryDb($sql);
//die();
$showResult = assocDb($rs_result);

?>