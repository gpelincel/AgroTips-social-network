<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Source\Models\Post;

extract($_POST);
$url = url('timeline');

if ($text == '') {
?>

    <script>
        alert('Não é possível postar postagens em branco!');
    </script>

    <meta http-equiv="refresh" content="1; url=<?= $url ?>">

<?php
} else {
    $post = new Post();
    $post->id_user = $id_user;
    $post->post_text = htmlspecialchars($text);
    $post->publish_day = date('Y-m-d H:i:s');
    $post->save();

    header("Location:$url");
}
