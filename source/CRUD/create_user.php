<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Source\Models\User;

extract($_POST);
extract($_FILES);

$imgPath = 'lib/users_img/';
$imgFile = $imgPath . basename($_FILES['img']['name']);

$verifyEmail = (new User())->find("email = :email", ":email=$email")->count();

if ($verifyEmail === 0) {
    if ($_FILES['img']['name'] != '') {

        if ($_FILES['img']['type'] == 'image/jpeg' || $_FILES['img']['type'] == 'image/png') {

            if ($name != '' && $category > 0 && $category < 4 && $email != '' && $password != '') {

                move_uploaded_file($_FILES['img']['tmp_name'], $imgFile);

                $user = new User();
                $user->name = $name;
                $user->email = $email;
                $user->password = sha1($password);
                $user->id_category = (int)$category;
                $user->profile_img = $imgFile;
                $user->save();

?>
                <meta http-equiv="refresh" content="1; url=<?= url() ?>">

                <script>
                    alert("Seu cadastro foi concluído com sucesso!");
                </script>
            <?php
            } else {
            ?>
                <meta http-equiv="refresh" content="1; url=<?= url('cadastro') ?>">

                <script>
                    alert("Por favor preencha todos os campos corretamente!");
                </script>
            <?php
            }
        } else {
            echo "Possível ataque de upload de arquivo!\n";

            $url = url('cadastro');

            header("Location: $url");
        }
    } else {

        if ($name != '' && $category > 0 && $category < 4 && $email != '' && $password != '') {

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = sha1($password);
            $user->id_category = (int)$category;
            $user->save();

            ?>
            <meta http-equiv="refresh" content="3; url=<?= url() ?>">

            <script>
                alert("Seu cadastro foi concluído com sucesso!");
            </script>
        <?php
        } else {
        ?>
            <meta http-equiv="refresh" content="1; url=<?= url('cadastro') ?>">

            <script>
                alert("Por favor preencha todos os campos corretamente!");
            </script>
    <?php
        }
    }
} else {
    ?>
    <script>
        alert('Email já está em uso');
    </script>

    <meta http-equiv="refresh" content="2; url=<?= url('cadastro') ?>">
<?php
}
?>