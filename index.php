<?php
session_start();
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
    <link rel="stylesheet" href="use/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>my blog</title>
</head>
<body>
<div class="container" id="main_back">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent main_back">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php
                if ($_SESSION['user_info']) {
                    echo "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"controller/logOut_control.php\">Log Out</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"view/account.php\">My page</a>
            </li>
            ";
                } else {
                    echo "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"view/registration.php\">Registration</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"view/login.php\">Log In</a>
            </li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="wrapper" id="bg-light">

    </div>

</div>
</body>
</html>