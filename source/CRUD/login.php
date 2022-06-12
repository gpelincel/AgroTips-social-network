<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use Source\Models\User;

extract($_POST);

$npassword = sha1($password);
$model = new User();

$is_login = $model->find("email = :email AND password = :password", "email=$email&password=$npassword");

if ($is_login->count() === 1) {
    $user = $is_login->fetch();
    session_start();
    $_SESSION['id_user'] = $user->id_user;
    $_SESSION['email'] = $user->email;
    $_SESSION['name'] = $user->name;
    $_SESSION['profile_img'] = $user->profile_img;

    $url = url('timeline');

    header("Location: $url");
} else {
    $url = url();

    header("Location: $url");
}
