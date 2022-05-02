<?php
session_start();

//$mysqli = new mysqli("172.16.42.130", "student_admin", "dbstudent", "Chat") or die("No Connection :(");

phpinfo();

$username = $_SESSION['uname'] = htmlspecialchars($_POST('username'));
$password = $_SESSION['password'] = htmlspecialchars($_POST('pass'));


?>

<button type="submit"><a href="register.php">Drücken</a></button> 