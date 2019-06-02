<?php
if (!isset($_SESSION)) {
	session_start();
}

error_reporting(E_ALL);
include('../Connections/connect.php');
$usersess=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['usersess']));
$uid=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));
$userR=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserRole']));
$_SESSION['MM_Username'] = $usersess;
if ($update=$localhost2->query("UPDATE users SET UserRole='$userR' WHERE UserID='$uid'")) {
	echo '<script>alert("Update Successful")
var newLocation ="../UserPanel/tables/employeetlb.php";
window.location = newLocation;</script>';

}
else
	echo '<script>alert("Error1. Please Try again!!!")
var newLocation ="../UserPanel/tables/employeetlb.php";
window.location = newLocation;</script>';