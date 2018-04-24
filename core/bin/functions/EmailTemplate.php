<?php

function EmailTemplate($user, $link){

	$HTML = '
	<html>
		<body style= "background: #FFFFFF; font-family: Verdana; font-size: 14px; color: #1c1b1b;">
			<div style="">
				<h2> Hola ' . $user . '</h2>
				<p style ="font-size: 17px;"> Thank you for registeering in ' . APP_TITLE . '. </p>
				
				<p style="padding: 15px; background-color: #ECF8FF;"> 
					To activate your account, you need to click <a style="font-weight: bold; color: #2BA6CB;" href= "' . $link . '" target= "_blank">HERE </a>

				</p>
				<p style= "font-size: 9px;">&copy; ' . date('Y', time()) . ' ' . APP_TITLE . '. All rights reserved. </p>
			</div>
		</body>
	</html>
	';

	return $HTML;
}
?>
