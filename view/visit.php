<?php
include_once "../controller/search.php";


//include_once "../model/data_base.php";
//$output = "";
//
//if (isset($_POST['search'])) {
//    $search = $_POST['search'];
//    $search = preg_replace("#[^0-9a-z]#i", "", $search);
//    $result = queryDb("SELECT * FROM articles as art INNER JOIN task ON task.id = art.user_id WHERE title LIKE '%$search%'");
//    $count = mysqli_num_rows($result);
//    if ($count == 0) {
//        $output = "There is no results";
//    } else {
//        $matches = assocDb($result);
//    }
//}


if (isset($_GET['user'])) {
    $search = $_GET['user'];
//    var_dump($search);
//    die();
    $visitor = assocDb(queryDb("SELECT * FROM task WHERE id = '$search'"));
}

foreach ($visitor as $visit) {
    $visitId = $visit['id'];
    $visitArticle = assocDb(queryDb("SELECT * FROM articles WHERE user_id = '$visitId'"));
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../use/style.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light user_nav">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-decoration-none" href="../index.php">Home <span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-decoration-none" href="../controller/logOut_control.php">log out</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-decoration-none" href="../view/account.php">My page</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row" id="user_info">
        <?php foreach ($visitor as $visit) : ?>
            <div class="col-4">
                <img class="user_avatar" src="../images/<?= $visit['picture'] ?>" alt="img">
            </div>
            <div class="col-8">
                <div class="user_data">
                    <h4><?= $visit['f_name']; ?> </h4>
                    <h4><?= $visit['l_name']; ?> </h4>
                    <h4><?= $visit['e_mail']; ?> </h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <div class="article_section" style="margin: 0 10%;">
        <div class="row" id="pushArticle">
            <?php foreach ($visitArticle as $visitArt) : ?>
                <div class="card mr-3" id="article_row">
                    <div class="card-header"><p class="article_content"><?= $visitArt['title'] ?></p></div>
                    <div class="card-body">
                        <div class="col-12">
                            <img src="../images/title_images/<?= $visitArt['picture'] ?> " class="img img-responsive"
                                 width="100px" alt="img" id="article_picture">
                        </div>
                        <div class="col-12 article_area">
                            <p class="title article_title"><?= $visitArt['article'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>


