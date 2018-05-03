<?php

$db = new Connection();
$sql = $db->query("SELECT * FROM users WHERE active = 0 ");
while ($result = $db->array($sql)) {
	$id = $result['id'];
	$login = $result['login'];

	$data[] = array('id'=>$id, 'login'=>$login);
}

$db->free($sql);
$db->close();

echo json_encode($data);

?>