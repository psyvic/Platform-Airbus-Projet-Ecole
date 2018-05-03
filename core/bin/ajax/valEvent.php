<?php

$shift_id = $_POST['shift_id'];


$db = new Connection();
$sql = $db->query("UPDATE shifts SET valid = 1 WHERE shift_id = '$shift_id'");

$db->free($sql);
$db->close();

echo 1;
?>