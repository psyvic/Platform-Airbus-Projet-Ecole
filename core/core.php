<?php


session_start();
//Connection Constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'RTP-TWEB');

//App Constants
define('HTML_DIR','html/');
define('APP_TITLE','Airbus Employees');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . ' Airbus Software. ');
define('APP_URL', 'http://localhost:8888/RTP-TWEB/');

//Structure
require('vendor/autoload.php');
require('core/models/class.Connection.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');

$users = Users();
?>
