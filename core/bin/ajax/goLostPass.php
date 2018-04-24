<?php
if (!empty($_POST['login']) and !empty($_POST['pass'])) {
	$db = new Connection();
	$login = $db->real_escape_string($_POST['login']);
	$pass = Encrypt($_POST['pass']);
	$sql =$db->query("SELECT id FROM users WHERE login='$login' LIMIT 1;");
	if ($db->rows($sql) > 0) {
		$id = $db->browse($sql)[0];
		$db->query("UPDATE users SET pass='$pass', active='0' WHERE id='$id';");
		echo 1;
	} else {
		echo '<div class="alert alert-dismissible alert-danger">
		  	<button type="button" class="close" data-dismiss="alert">&times;</button>
		  	<strong>Oh Snap! ERROR!</strong> User login is incorrect.
			</div>';
	}
	$db->free($sql);
	$db->close();
} else {
	echo '<div class="alert alert-dismissible alert-danger">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<strong>Oh Snap! ERROR!</strong> You must fill user login and password.
		</div>';
}

?>