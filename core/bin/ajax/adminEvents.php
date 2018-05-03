<?php

$db = new Connection();
$sql = $db->query("SELECT * FROM shifts WHERE valid IS NULL");
while ($result = $db->array($sql)) {
	$shift_id = $result['shift_id'];
	$user_login = $result['user_login'];
	$start = $result['event_start'];
	$end = $result['event_end'];

	$data[] = array('shift_id'=>$shift_id, 'start'=> $start, 'end'=> $end, 'user_login'=>$user_login);
}

$db->free($sql);
$db->close();

echo json_encode($data);

?>