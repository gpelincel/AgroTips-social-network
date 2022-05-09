<?php

require_once './lib/conn.php';

extract($_POST);

if ($text == '') {
?>

    <script>
        alert('Não é possível postar postagens em branco!');
    </script>

    <meta http-equiv="refresh" content="1; url=my_posts.php">

<?php
} else {

    $sql = "UPDATE posts SET post_text = :text WHERE id_post = :id_post";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':text', $text);
    $stmt->bindValue(':id_post', $id_post);
    $stmt->execute();

    header('Location: my_posts.php');
}