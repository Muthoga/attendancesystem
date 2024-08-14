<?php
//connect to db 
$conn = new mysqli("localhost","root","","attendancesystem");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//set date zone for Africa.
date_default_timezone_set('Nairobi/Kenya');


if(!(isset($_SESSION['id']))){
	header('Location: studentlogin.php');
	die();
}
?>

