<?php
// -----------------for PHPMailer --------------------------
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// -----------------for PHPMailer END-----------------------

if(!empty($_POST['add'])) {
	echo 'add funciona';
} 
$db = new Connection();

$login = $db->real_escape_string($_POST['login']);
$lastName = strtoupper($_POST['lastName']);
$lastName = $db->real_escape_string($lastName);
$firstName = $db->real_escape_string($_POST['firstName']);
$jobNumber = $db->real_escape_string($_POST['jobNumber']);
$site = $db->real_escape_string($_POST['site']);
$pass = Encrypt($_POST['pass']);

$sql =$db->query("SELECT login FROM users WHERE login = '$login' OR jobNumber = '$jobNumber' LIMIT 1;");

if ($db->rows($sql) == 0) {
	$keyreg = md5(time());
	$link = APP_URL . '?view=activate&key=' . $keyreg;

	// -------------------------------------------- PHPMAILER------------------------
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
	    //Server settings
	    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = PHPMAILER_HOST;  					  	  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = PHPMAILER_USER;            		  // SMTP username
	    $mail->Password = PHPMAILER_PASS;                     // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = PHPMAILER_PORT;                         // TCP port to connect to

	    //Recipients
	    $mail->setFrom(PHPMAILER_USER, APP_TITLE);
	    $mail->addAddress($login, $firstName);     			  // Add a recipient


	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Account Activation';
	    $mail->Body    = EmailTemplate($firstName, $link);
	    $mail->AltBody = 'Hello' . $firstName . '. To activate your account you need to click on this link: ' . $link;

	    $mail->send();

	    // echo 'Message has been sent';

    	// if Mail sent successfully whe add in the DB
		$db->query("INSERT INTO users (login, lastName, firstName, jobNumber, pass, keyreg, site) VALUES ('$login', '$lastName', '$firstName', '$jobNumber', '$pass', '$keyreg', '$site');");
		$sql_2 = $db->query("SELECT MAX(id) AS id FROM users;");
		// $_SESSION['app_id'] = $db->browse($sql_2)[0];
		$db->free($sql_2);
		$HTML = 1;


	} catch (Exception $e) {
	    $HTML = '<div class="alert alert-dismissible alert-danger">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<strong>Oh Snap! ERROR!</strong> Message could not be sent. Mailer Error: ' . 
	  	$mail->ErrorInfo . '</div>'; 
	}
	// -------------------------------------------- PHPMAILER FIN-----------------------


	// $HTML = '<div class="alert alert-dismissible alert-success">
 //  	<button type="button" class="close" data-dismiss="alert">&times;</button>
 //  	<strong>Success</strong> An email was sent to verify your accound.
	// </div>';

} else {
	$user = $db->browse($sql)[0];
	if (strtolower($login) == strtolower($user)) {
	$HTML = '<div class="alert alert-dismissible alert-danger">
  	<button type="button" class="close" data-dismiss="alert">&times;</button>
  	<strong>Oh Snap! ERROR!</strong> An user with the same email already exists.
	</div>'; 
	} else {
		$HTML = '<div class="alert alert-dismissible alert-danger">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<strong>Oh Snap! ERROR!</strong> An user with the same Job Number already exists.
		</div>'; 
	}
}

$db->free($sql);
$db->close();

echo $HTML;
?>