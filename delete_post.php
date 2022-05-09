<?php

require_once './lib/conn.php';

$id_post = (int)$_GET['id_post'];

$sql = "DELETE FROM posts WHERE id_post = :id_post";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id_post',$id_post);
$stmt->execute();
header('Location: my_posts.php');
?>