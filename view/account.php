<?php
error_reporting(E_ALL);
include_once "../model/auth_session.php";
include_once "../model/data_base.php";
include_once "../controller/pagination.php";
//include_once "../controller/search.php";
$selectLastArticle = assocDb(queryDb("SELECT * FROM articles WHERE user_id='" . $user['id'] . "'"));

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--    <script src="dist/jquery.simplePagination.js"></script>-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="../use/style.css">
    <title>Document</title>
</head>
<body>

<!----------------------------------navbar---------------------------------------->


<div class="container" style="background-color:#acdad7;">
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
                    <a class="nav-link text-decoration-none" href="account.php">My page</a>
                </li>
            </ul>
        </div>
        <div class="float-right">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" method="post" action="search_page.php">
                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search"
                           aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </div>
    </nav>
    <!----------------------------------user info-------------------------------------->
    <div class="row" id="user_info">
        <div class="col-4">
            <img class="user_avatar" src="../images/<?= $user['picture'] ?>" alt="img">
        </div>
        <div class="col-8">
            <div class="user_data">
                <h4><?= $user['f_name']; ?> </h4>
                <h4><?= $user['l_name']; ?> </h4>
                <h4><?= $user['e_mail']; ?> </h4>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#myModal">Change
                </button>
            </div>
            <!----------------------------- USER  MODAL ------------------------->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Change Info</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class="reg_form" id="dataForm" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"
                                           name="name" value="<?= $user['f_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname"
                                           value="<?= $user['l_name']; ?>"
                                           name="surname">
                                </div>
                                <div class="form-group">
                                    <label for="picture">Picture</label>
                                    <input type="file" class="form-control" id="picture"
                                           value="<?= $user['picture']; ?>"
                                           name="file">
                                </div>
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email"
                                           value="<?= $user['e_mail']; ?>"
                                           name="email">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                               value="<?= $user['pass']; ?>" name="password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success save" data-dismiss="modal"
                                        data-id="<?= $user['id']; ?>">Save
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-------------------------------------------------ALL Articles-------------------------------------------->
    <!--------------------------------------------------search------------------------------------------------>
    <div class="clearfix">
        <div class="row article_row float-right">
            <!--    ------------------------------------------article modal--------------------------------->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo" style="margin: 0px 30px;">ADD
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="reg_form" id="articleForm" method="post" enctype="multipart/form-data">
                                <div class="form-group ">
                                    <label for="article_title" class="col-form-label">Title</label>
                                    <input type="text" class="form-control add_title" id="article_title"
                                           name="article_title">
                                </div>
                                <div class="form-group">
                                    <label for="article_content" class="col-form-label">Article</label>
                                    <textarea class="form-control add_article" id="article_content"
                                              name="article_content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="article_picture">Article Picture</label>
                                    <input type="file" class="form-control" id="article_picture"
                                           name="article_picture">
                                </div>
                                <button type="submit" class="btn btn-primary add" data-dismiss="modal">Add
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    <!--    ------------------------------------------article div---------------------------------->
    <div class="article_section" style="margin: 0 10%;">
        <?php if (isset($selectLastArticle)): ?>
            <div class="row" id="pushArticle">
                <?php foreach ($showResult as $post) : ?>
                    <div class="card mr-3" id="article_row">
                        <div class="card-header"><p class="article_content"><?= $post['title'] ?></p></div>
                        <div class="card-body">
                            <div class="col-12">
                                <img src="../images/title_images/<?= $post['picture'] ?> " class="img img-responsive"
                                     width="100px" alt="img" id="article_picture">
                            </div>
                            <div class="col-12 article_area">
                                <p class="title article_title"><?= $post['article'] ?></p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <button type="submit" class="btn btn-primary" data-id="<?= $post['id'] ?>"
                                        data-toggle="modal" data-target="#articleModal<?= $post['id'] ?>"
                                        data-whatever="@mdo">Update
                                </button>

                                <!--------------------------------------------------UPDATE MODAL---------------------------->

                                <div class="modal fade" id="articleModal<?= $post['id'] ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Change Article</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updateArticle" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="recipient-name"
                                                               class="col-form-label">Title</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                               name="articleTitle" value="<?= $post['title'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name"
                                                               class="col-form-label">Picture</label>
                                                        <!--                        <img style="width: 30px;" src="../images/title_images/-->
                                                        <? //= $post['picture'] ?><!-- " alt="img">-->
                                                        <input type="file" class="form-control" id="recipient-name"
                                                               name="articlePicture">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text"
                                                               class="col-form-label">Article</label>
                                                        <textarea class="form-control" id="message-text"
                                                                  name="articleContent"><?= $post['article'] ?></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary update"
                                                            data-id="<?= $post['id'] ?>" data-dismiss="modal">Update
                                                    </button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger delete" data-id="<?= $post['id'] ?>">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!------------------------------------------------------PAGES---------------------------------->
    <div class="pagination" style="margin-top: 30px;">
        <nav aria-label="Page navigation example" class="pages" style="margin: 0 auto">
            <ul class="pagination_line pagination" id="pagination">
                <?php if (!empty($totalPages)):for ($i = 1; $i <= $totalPages; $i++):
                    if ($i == 1):?>
                        <li class='active page-item' id="<?= $i; ?>"><a class='page-link'
                                                                        href='account.php?page=<?= $i; ?>'><?= $i; ?></a>
                        </li>
                    <?php else: ?>
                        <li class='page-item' id="<?= $i; ?>"><a class='page-link'
                                                                 href='account.php?page=<?= $i; ?>'><?= $i; ?></a></li>
                    <?php endif; ?>
                <?php endfor;endif; ?>
            </ul>
        </nav>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('li > a').click(function() {
            $('li').removeClass('active');
            $(this).parent().addClass('active');
        });
    });
</script>

<script src="../use/script.js"></script>
</body>
</html>