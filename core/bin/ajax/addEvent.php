<?php
$start = $_POST['start'];
$end = $_POST['end'];
$icao = $_POST['icao'];

$db = new Connection();
$sql = $db->query("INSERT INTO shifts (event_start, event_end, icao, user_id) VALUES ('$start', '$end', '$icao', 51);");
// $sql = $db->query("INSERT INTO shifts (event_start, event_end, icao,user_id) VALUES ('20', '201', 'hola', 51);");
// if ($db->query($sql)) {

	echo 1;
// }
// if ($db->aff_rows($sql) > 0) {
// 	echo 1;
$db->free($sql);
$db->close();
// } else {
// 	return;
// }
?>