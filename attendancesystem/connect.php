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

//set date zone for India.
date_default_timezone_set('Africa/Nairobi');

if(!(isset($_SESSION['teacher-name']))){
	header('Location: teacherlogin.php');
	die();
}
?>

