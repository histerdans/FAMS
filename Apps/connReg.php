<?php
if (!isset($_SESSION)) {
  session_start();
}

error_reporting();
include('../Connections/connect.php');

 
              

$username = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UName']));
$email =htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Email']));
$firstname =htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FName']));
$middlename = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['MName']));
$lastname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LName']));
$gender=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['gender']));
$pass=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['password']));
$user_r=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserRole']));
$date=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DateR']));
$_SESSION['MM_Username'] = $username;

if (isset($_SESSION['MM_Username'])) {
	if ($user_r=="Farm Worker") {
	if ($insert=$localhost2->query("INSERT INTO users(Username,Email,Password,Gender,FName,MName, 
		LName,UserRole,Date_Registered) 
		VALUES('$username','$email','$pass','$gender','$firstname','$middlename','$lastname','$user_r','$date')")) {
		echo '<script>alert("Registration Successfully")
	var newLocation ="../UserPanel/confirmation.php";
	window.location = newLocation;</script>';
	}
	
}
 elseif ($user_r=="Farm Owner") {
	if ($insert=$localhost2->query("INSERT INTO users(Username,Email,Password,Gender,FName,MName, 
		LName,UserRole,Date_Registered) 
		VALUES('$username','$email','$pass','$gender','$firstname','$middlename','$lastname','$user_r','$date')")) {
		echo '<script>alert("Registration Successfully")
	var newLocation ="../UserPanel/Register.php";
	window.location = newLocation;</script>';
	}
}
elseif ($user_r=="Farm Supervisor") {
	if ($insert=$localhost2->query("INSERT INTO users(Username,Email,Password,Gender,FName,MName, 
		LName,UserRole,Date_Registered) 
		VALUES('$username','$email','$pass','$gender','$firstname','$middlename','$lastname','$user_r','$date')")) {
		echo '<script>alert("Registration Successfully")
	var newLocation ="../UserPanel/confirmation.php";
	window.location = newLocation;</script>';
	}
}
else
{
	echo '<script>alert("Opps!! something might have gone wrong.. Please try again")
	var newLocation ="../UserPanel/login.php";
	window.location = newLocation;</script>';
}

}
else
echo '<script>alert("Opps!! Session Expired...Please try again")
	var newLocation ="../UserPanel/login.php";
	window.location = newLocation;</script>';


?>