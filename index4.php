<?php
require('core/core.php');
header('Content-Type: application/json');
$data = array();
$db = new Connection();
$sql = $db->query("SELECT * FROM shifts");
// var_dump($sql);
// $result = $db->array($sql);
// var_dump($result);
while ($result = $db->array($sql)) {

	$shift_id = $result['shift_id'];
	$start = $result['event_start'];
	$icao = $result['icao'];
	$end = $result['event_end'];
	$data[] = array('shift_id'=>$shift_id, 'start'=> $start, 'end'=> $end, 'title'=> $icao);
}

// echo $db->rows($sql);
// $data[0] = $result;
echo json_encode($data);
	$db->free($sql);
	$db->close();

?>