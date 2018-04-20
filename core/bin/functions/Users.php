<?php

function Users() {
	$db = new Connection();
	$sql = $db->query("SELECT * FROM users;");
	if ($db->rows($sql) > 0) {
		while ($d = $db->browse($sql)) {
			$users[$d['id']] = array(
				'id' => $d['id'],
				'login' => $d['login'],
				'lastName' => $d['lastName'],
				'firstName' => $d['firstName'],
				'jobNumber' => $d['jobNumber'],
				'admin' => $d['admin']
			);
		}
	} else {
		$users = false;
	}
	$db->free($sql);
	$db->close();
	return $users;
}
?> 