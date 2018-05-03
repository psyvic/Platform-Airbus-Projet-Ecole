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
			case 'adminEvents' :
				require('core/bin/ajax/adminEvents.php');
				break;
			case 'valEvent' :
				require('core/bin/ajax/valEvent.php');
				break;
			case 'adminUsers' :
				require('core/bin/ajax/adminUsers.php');
				break;
			case 'valUser' :
				require('core/bin/ajax/valUser.php');
				break;
			default :
				header('location: index.php');
				break;
		}
	} else {
		header('location: index.php');  
	}

?>