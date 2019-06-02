<?php

error_reporting(E_ALL);
include('../Connections/connect.php');
session_start();

$loc = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['mtaa']));
$nagoz = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['nagoz']));
$fname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['fname']));
$mname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['mname']));
$lname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['lname']));
$email = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['email']));
$pass = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['pass']));
$uname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['uname']));
$uid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));

$_SESSION['MM_Username'] = $uname;
$user=$_SESSION['MM_Username'];
if ($update=$localhost2->query("UPDATE users SET Username='$user',FName='$fname',MName='$mname',LName='$lname',Email='$email',Password='$pass',OLocation='$loc',PhoneNo='$nagoz' WHERE UserID='$uid'")) {
	echo '<script>alert("Profile Updated Successfully!!!")
	var newLocation = "../UserPanel/YProfile1.php";
	window.location = newLocation;</script>';


}
else
{
	echo '<script>alert("Opps!! some might have gone wrong. Please try again")
	var newLocation = "../UserPanel/YProfile1.php";
	window.location = newLocation;</script>';
}

