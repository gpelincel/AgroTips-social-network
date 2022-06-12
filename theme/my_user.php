<?php $v->layout('_theme'); ?>

<?php

session_start();

if (!isset($_SESSION['id_user'])) {
    $url = url();
    header("Location: $url");
} else {

?>

    <?php $v->start('navbar'); ?>
    <nav class="navbar fixed-top navbar-expand navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= url('timeline') ?>">AgroTips</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                </ul>
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="true">
                        <?php
                        if ($_SESSION['profile_img'] == "") {
                        ?>
                            <i class="bi bi-person-circle" style="font-size: 30px;"></i>
                        <?php
                        } else {
                        ?>
                            <img src="" alt="mdo" width="40" height="40" class="rounded-circle">
                        <?php
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 34px);">
                        <li><a class="dropdown-item" href="<?= url('functions/logout') ?>">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php $v->end(); ?>

    <main id="main" class="text-light container-fluid bg-success bg-gradient" style="height: 100vh">
        <div id="header" class="text-center mt-5">
            <br>
            <h1 class="mb-5">Edite e exclua as postagens que você já fez</h1>
            <hr>
        </div>

        <?php
        if ($posts) {
            foreach ($posts as $post) {
                $user = $post->getUser();

                $user->getCategory();
        ?>

                <section class="container bg-light bg-opacity-50 text-dark border shadow rounded mt-5">
                    <div id="post" class="p-2">
                        <div id="header-post" class="row mt-2">
                            <div class="col-auto">
                                <?php
                                if ($user->profile_img == "" || $user->profile_img == null) {
                                ?>
                                    <i class="bi bi-person-circle" style="font-size: 45px;"></i>
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle" src="<?= $user->profile_img ?>" alt="" height="55" width="55">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col">
                                <h3><?= $user->name ?></h3>
                                <p class="text-black-50"> <?= $user->getCategory() ?> </p>
                            </div>
                        </div>

                        <div id="post-body" class="m-3">
                            <p><?= $post->post_text ?></p>
                        </div>
                        <div id="post-footer" class="text-end">
                            <a href="<?= url("meu-perfil/$_SESSION[id_user]/delete-post/$post->id_post");  ?>" class="btn btn-lg btn-danger"><i class="bi bi-trash"></i></a>
                            <a data-bs-target="#editPost" data-bs-toggle="modal" href="" class="btn btn-lg btn-primary"><i class="bi bi-pencil-square"></i></a>
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
                                <form action="<?= url("meu-perfil/$_SESSION[id_user]/update-post/$post->id_post");  ?>" method="post">
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
            <?php
            }
        } else {
            ?>
            <div class="container-fluid flex justify-center">
                <h2 class="text-center">Parece que você não fez nenhum post ainda... Volte para a tela inicial para fazer um post!</h2>
            </div>
        <?php
        }
        ?>

    </main>
    </div>
<?php } ?>