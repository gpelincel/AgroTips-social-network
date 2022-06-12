<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Source\Models\Post;

$post = (new Post())->findById($id_post);
$post->destroy();

$url = url("meu-perfil/$id");

header("Location: $url");