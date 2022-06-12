<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Source\Models\Post;

extract($_POST);

$post = (new Post())->findById($id_post);
$user = $post->getUser();
$url = url("meu-perfil/$user->id_user");

if ($text == '') {
?>

    <script>
        alert('Não é possível postar postagens em branco!');
    </script>

    <meta http-equiv="refresh" content="1; url=<?= $url ?>">

<?php
} else {
    $post = (new Post())->findById($id_post);
    $post->post_text = htmlspecialchars($text);
    $post->save();

    header("Location:$url");
}
