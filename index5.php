<?php

require('core/core.php');
header('Content-Type: application/json');


$data = array();

//create connection and select DB
$db = new mysqli($DB_HOST, 'root', 'root', 'RTP-TWEB');
if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}

//get user data from the database
$query = $db->query("SELECT * FROM shifts");

if($query->num_rows > 0){
    $userData = $query->fetch_assoc();
    // $data['status'] = 'ok';
    $data[]= $userData;
}else{
    $data['status'] = 'err';
    $data['result'] = '';
}

//returns data as JSON format
echo json_encode($data);

?>