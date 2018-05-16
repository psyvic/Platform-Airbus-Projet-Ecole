<?php
require('core/core.php');
header('Content-Type: application/json');
$data = array();
$db = new Connection();
$sql = $db->query("SELECT * FROM shifts");
while ($result = $db->array($sql)) {
	$shift_id = $result['shift_id'];
	$start = $result['event_start'];
	$end = $result['event_end'];
	$icao = $result['icao'];
	$valid = $result['valid'];
	if ($result['valid'] == NULL) {
		$color = 'gray';
	} else {
		$color = 'green';
	}
	$airline = $result['airline'];
	$act_days = $result['act_days'];
	$type_deploy = $result['type_deploy'];
	$user_login = $result['user_login'];
	$data[] = array('shift_id'=>$shift_id, 'start'=> $start, 'end'=> $end . 'T23:59:00', 'icao'=> $icao, 'valid'=> $valid, 'color'=> $color, 'airline'=> $airline, 'act_days'=> $act_days, 'type_deploy'=> $type_deploy, 'user_login'=>$user_login, 'title'=>$user_login);
}

$db->free($sql);
$db->close();
echo json_encode($data);

?>