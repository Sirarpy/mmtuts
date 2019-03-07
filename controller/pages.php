<?php
//include_once "../model/data_base.php";
//include "";


//$totalResult = queryDb("SELECT COUNT(id) FROM articles")->fetch_assoc();
//$result = queryDb("SELECT * FROM articles LIMIT  5")->fetch_assoc();
$limitShow = 5;
$totalResult = queryDb("SELECT COUNT(id) FROM articles");
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
$sql = "SELECT * FROM articles LIMIT ".$start_from.",".$limitShow;
$rs_result = queryDb($sql);
//var_dump($rs_result);
//die();

?>
