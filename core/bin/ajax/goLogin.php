<?php

if (!empty($_POST['user']) and !empty($_POST['pass'])) {
	$db = new Connection();
	$data= $db->real_escape_string($_POST['user']);
	$pass = Encrypt($_POST['pass']);
	$sql = $db->query("SELECT id FROM users WHERE (login='$data' OR nbr='$data') AND pass ='$pass' LIMIT 1;");
	// $sql = $db->query("SELECT * FROM users");

	if ($db->rows($sql) > 0) {
		echo 1;
	} else {
		echo '<div class="alert alert-dismissible alert-danger">
		  	<button type="button" class="close" data-dismiss="alert">&times;</button>
		  	<strong>Oh Snap! ERROR!</strong> User and/or password are incorrect.
			</div>';

	}
	$db->close();
} else {
	echo '<div class="alert alert-dismissible alert-danger">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<strong>Oh Snap! ERROR!</strong> You must fill user and password.
		</div>';
}

?>