<?php
include_once "../model/data_base.php";
$output = "";

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $search = preg_replace("#[^0-9a-z]#i", "", $search);
    $result = queryDb("SELECT * FROM articles as art INNER JOIN task ON task.id = art.user_id WHERE title LIKE '%$search%'");
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        $output = "There is no results";
    } else {
        $matches = assocDb($result);
    }
}

?>

