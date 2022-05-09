<?php

require_once 'lib/conn.php';

extract($_POST);

$imgPath = 'lib/users_img/';
$imgFile = $imgPath . basename($_FILES['img']['name']);

$verifyUserSQL = 'SELECT * FROM users WHERE email = :email';
$verifyUser = $conn->prepare($verifyUserSQL);
$verifyUser->bindValue('email', $email);
$verifyUser->execute();
$userExist = $verifyUser->fetchColumn();

if ($userExist == 0) {

    if ($_FILES['img']['name'] != '') {

        if ($_FILES['img']['type'] == 'image/jpeg' || $_FILES['img']['type'] == 'image/png') {

            if ($name != '' && $category > 0 && $category < 4 && $email != '' && $password != '') {

                move_uploaded_file($_FILES['img']['tmp_name'], $imgFile);

                $sql = "INSERT INTO users VALUES (null, :category, :name, :email, :imgPath, :password)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':category', $category);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':imgPath', $imgFile);
                $stmt->bindValue(':password', sha1($password));
                $stmt->execute();

?>
                <meta http-equiv="refresh" content="1; url=index.php">

                <script>
                    alert("Seu cadastro foi concluído com sucesso!");
                </script>
            <?php
            } else {
            ?>
                <meta http-equiv="refresh" content="1; url=cad_user.php">

                <script>
                    alert("Por favor preencha todos os campos corretamente!");
                </script>
            <?php
            }
        } else {
            echo "Possível ataque de upload de arquivo!\n";
            header('Location: cad_user.php');
        }
    } else {

        if ($name != '' && $category > 0 && $category < 4 && $email != '' && $password != '') {

            $sql = "INSERT INTO users VALUES (null, :category, :name, :email, '', :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':category', $category);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', sha1($password));
            $stmt->execute();

            ?>
            <meta http-equiv="refresh" content="3; url=index.php">

            <script>
                alert("Seu cadastro foi concluído com sucesso!");
            </script>
            <?php
        } else {
            ?>
                <meta http-equiv="refresh" content="1; url=cad_user.php">

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

    <meta http-equiv="refresh" content="2; url=cad_user.php">

<?php
}
?>