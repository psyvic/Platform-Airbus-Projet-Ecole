<?php
$shift_id = $_POST['shift_id'];
$start = $_POST['start'];
$end = $_POST['end'];
$icao = $_POST['icao'];

$db = new Connection();
$sql = $db->query("UPDATE shifts SET event_start = '$start', event_end = '$end', icao = '$icao' WHERE shift_id = '$shift_id';");

// $sql = $db->query("INSERT INTO shifts (event_start, event_end, icao, user_id) VALUES ('$start', '$end', '$icao', 51);");
// $sql = $db->query("INSERT INTO shifts (event_start, event_end, icao,user_id) VALUES ('20', '201', 'hola', 51);");
// if ($db->query($sql)) {
$db->free($sql);
$db->close();
echo 1;

?>