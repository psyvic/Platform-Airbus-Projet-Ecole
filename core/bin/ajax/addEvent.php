<?php
$start = $_POST['start'];
$end = $_POST['end'];
$icao = $_POST['icao'];
$user_id = $_SESSION['app_id'];
$airline = $_POST['airline'];
$type_deploy = $_POST['type_deploy'];
$deploy_days = $_POST['deploy_days'];


$db = new Connection();
$sql = $db->query("INSERT INTO shifts (event_start, event_end, icao, user_id, user_login, airline, type_deploy, act_days) VALUES ('$start', '$end', '$icao', '$user_id', (SELECT login FROM users WHERE id = '$user_id'), '$airline', '$type_deploy', '$deploy_days');");
	echo 1;
$db->free($sql);
$db->close();
?>