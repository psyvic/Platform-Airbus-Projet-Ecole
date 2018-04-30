<?php
$shift_id = $_POST['shift_id'];

echo $shift_id;
$db = new Connection();
$sql = $db->query("DELETE FROM shifts WHERE shift_id = '$shift_id';");

// $sql = $db->query("INSERT INTO shifts (event_start, event_end, icao, user_id) VALUES ('$start', '$end', '$icao', 51);");
// $sql = $db->query("INSERT INTO shifts (event_start, event_end, icao,user_id) VALUES ('20', '201', 'hola', 51);");
// if ($db->query($sql)) {
$db->free($sql);
$db->close();
echo 1;

?>