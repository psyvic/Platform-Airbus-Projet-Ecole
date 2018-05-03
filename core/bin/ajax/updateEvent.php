<?php
$shift_id = $_POST['shift_id'];
$start = $_POST['start'];
$end = $_POST['end'];
$icao = $_POST['icao'];

$airline = $_POST['airline'];
$type_deploy = $_POST['type_deploy'];
$deploy_days = $_POST['deploy_days'];

$db = new Connection();
$sql = $db->query("UPDATE shifts SET event_start = '$start', event_end = '$end', icao = '$icao', airline = '$airline', type_deploy = '$type_deploy', act_days = '$deploy_days' WHERE shift_id = '$shift_id';");

$db->free($sql);
$db->close();
echo 1;

?>