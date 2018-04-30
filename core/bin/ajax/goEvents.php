<?php
// require('core/core.php');
header('Content-Type: application/json');
$data = array();
$db = new Connection();
$sql = $db->query("SELECT * FROM shifts");

while ($result = $db->array($sql)) {

	$shift_id = $result['shift_id'];
	$start = $result['start'];
	$icao = $result['icao'];
	$end = $result['end'];
	$data[] = array('shift_id'=>$shift_id, 'start'=> $start, 'end'=> $end, 'title'=> $icao);
}

echo json_encode($data);
$db->free($sql);
$db->close();

?>