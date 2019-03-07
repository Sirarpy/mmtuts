<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../use/style.css">
    <title>Document</title>
</head>
<body>
<form class="log_form" method="post" action="../controller/login_control.php">
    <h5 class="card-header reg_title">LOGIN</h5>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email..." name="email">
        </div>
        <div class="form-group col-md-12">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password..." name="password">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
    <a href="../index.php" class="btn btn-primary">Back</a>

    <?php if (isset($_GET['sms'])) : ?>
        <div class="p-2 mb-2 bg-danger text-white" style="margin-top: 20px">
            <?php echo $_GET['sms'] ?>;
        </div>
    <?php endif; ?>
</form>
</body>
</html>