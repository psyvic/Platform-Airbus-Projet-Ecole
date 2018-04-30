<?php

if (!empty($_POST['user']) and !empty($_POST['pass'])) {
	$db = new Connection();
	$data= $db->real_escape_string($_POST['user']);
	$pass = Encrypt($_POST['pass']);
	$sql = $db->query("SELECT id FROM users WHERE (login='$data' OR jobNumber='$data') AND pass ='$pass' LIMIT 1;");
	if ($db->rows($sql) > 0) {
		if ($_POST['session']) { ini_set('session.cookie_lifetime', time() + (60 * 60 * 24)); }
		$_SESSION['app_id'] = $db->browse($sql)[0];
		echo 1;
	} else {
		echo '<div class="alert alert-dismissible alert-danger">
		  	<button type="button" class="close" data-dismiss="alert">&times;</button>
		  	<strong>Oh Snap! ERROR!</strong> User and/or password are incorrect.
			</div>';
	}
	$db->free($sql);
	$db->close();
} else {
	echo '<div class="alert alert-dismissible alert-danger">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<strong>Oh Snap! ERROR!</strong> You must fill user and password.
		</div>';
}

?>