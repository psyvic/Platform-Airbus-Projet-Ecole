<?php
	if ($_POST){

		require('core/core.php');
		switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
			case 'login' :
				require('core/bin/ajax/goLogin.php');
				break;
			case 'reg' :
				require('core/bin/ajax/goReg.php');
				break;
			case 'lostPass' :
				require('core/bin/ajax/goLostPass.php');
				break;
			case 'events' :
				require('core/bin/ajax/goEvents.php');
				break;
			case 'addEvent' :
				require('core/bin/ajax/addEvent.php');
				break;
			case 'eraseEvent' :
				require('core/bin/ajax/eraseEvent.php');
				break;
			case 'updateEvent' :
				require('core/bin/ajax/updateEvent.php');
				break;
			default :
				header('location: index.php');
				break;
		}
	} else {
		header('location: index.php');  
	}

?>