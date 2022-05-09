<?php

require_once './lib/conn.php';

$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
$isUser = $conn->prepare($sql);
$isUser->bindValue(':email', $_POST['email']);
$isUser->bindValue(':password', sha1($_POST['password']));
$isUser->execute();

if ($isUser->rowCount() === 1) {

    $user = $isUser->fetch(PDO::FETCH_OBJ);

    session_start();
    $_SESSION['id_user'] = $user->id_user;
    $_SESSION['email'] = $user->email;
    $_SESSION['name'] = $user->name;
    $_SESSION['profile_img'] = $user->profile_img;

    header('Location: timeline.php');

} else {
    ?>

    <script>
        alert('Email e/ou senha incorretos!');
    </script>
    <meta http-equiv="refresh" content="3; url=index.php">

    <?php
}
