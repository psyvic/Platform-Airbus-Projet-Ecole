<?php

$id = $_POST['id'];


$db = new Connection();
$sql = $db->query("UPDATE users SET active = 1 WHERE id = '$id'");

$db->free($sql);
$db->close();

echo 1;
?>