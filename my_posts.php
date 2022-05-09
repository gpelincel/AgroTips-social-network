<?php

session_start();

if (!isset($_SESSION['id_user'])) {

    header('Location: index.php');
} else {
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <title>AgroTips</title>
    </head>

    <body class="bg-success bg-gradient">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="timeline.php">AgroTips</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="true">
                            <?php
                            if ($_SESSION['profile_img'] == "") {
                            ?>
                                <i class="bi bi-person-circle" style="font-size: 30px;"></i>
                            <?php
                            } else {
                            ?>
                                <img src="<?= $_SESSION['profile_img'] ?>" alt="mdo" width="40" height="40" class="rounded-circle">
                            <?php
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 34px);">
                            <li><a class="dropdown-item" href="func_sair.php">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main id="main" class="text-light container-fluid" style="height: 100vh;">
            <div id="header" class="text-center pt-5">
                <br>
                <h1 class="mb-5">Edite e exclua as postagens que você já fez</h1>
                <hr>
            </div>

            <?php
            require_once './lib/conn.php';

            $sql = "SELECT * FROM posts INNER JOIN users ON users.id_user = posts.id_user INNER JOIN categories ON categories.id_category = users.id_category WHERE posts.id_user = :id_user ORDER BY publish_day DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_user', $_SESSION['id_user']);
            $stmt->execute();
            $myPosts = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($myPosts as $post) {
            ?>

                <section class="container bg-light bg-opacity-50 text-dark border shadow rounded mt-5">
                    <div id="post" class="p-2">
                        <div id="header-post" class="row mt-2">
                            <div class="col-auto">
                                <?php
                                if ($post->profile_img == "") {
                                ?>
                                    <i class="bi bi-person-circle" style="font-size: 45px;"></i>
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle" src="<?= $post->profile_img ?>" alt="" height="55" width="55">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col">
                                <h3><?= $post->name ?></h3>
                                <p class="text-black-50"><?= $post->category ?></p>
                            </div>
                        </div>
                        <div id="post-body" class="m-3">
                            <p><?= $post->post_text ?></p>
                        </div>
                        <div id="post-footer" class="text-end">
                            <a href="delete_post.php?id_post=<?= $post->id_post ?>" class="btn btn-lg btn-danger"><i class="bi bi-trash"></i></a>
                            <a data-bs-target="#editPost" data-bs-toggle="modal" href="edit_post.php" class="btn btn-lg btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <small class="text-muted"><?= date('d-m-Y', strtotime($post->publish_day)) ?></small>
                        </div>
                    </div>
                </section>

                <div class="modal fade" id="editPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPostLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <?php
                                if ($_SESSION['profile_img'] == "") {
                                ?>
                                    <i class="bi bi-person-circle text-dark" style="font-size: 45px;"></i>
                                <?php
                                } else {
                                ?>
                                    <img src="<?= $_SESSION['profile_img'] ?>" alt="mdo" width="55" height="55" class="rounded-circle">
                                <?php
                                }
                                ?>
                                <h3 class="ms-3 text-dark"><?= $_SESSION['name'] ?></h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="edit_post.php" method="post">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Qual a sua dica?" name="text" id="text" style="height: 100px;" required><?= $post->post_text ?></textarea>
                                    </div>
                                    <input type="hidden" class="form-control" id="id_post" name="id_post" value="<?= $post->id_post ?>">
                                    <button type="submit" class="btn btn-primary mt-1"> Editar </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </main>
        </div>
    </body>

    </html>
<?php }
