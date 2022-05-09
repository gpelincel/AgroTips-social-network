<?php

require_once './lib/conn.php';

extract($_POST);

if ($text == ''){
?>

<script>
    alert('Não é possível postar postagens em branco!');
</script>

<meta http-equiv="refresh" content="1; url=timeline.php">

<?php
}
else{
$sql = "INSERT INTO posts VALUES (null, :id_user, :text, now())";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id_user', $id_user);
$stmt->bindValue(':text', htmlspecialchars($text));
$stmt->execute();
}