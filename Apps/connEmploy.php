<?php
if (!isset($_SESSION)) {
	session_start();
}

error_reporting(E_ALL);
include('../Connections/connect.php');




$user = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UName']));
$farm = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Farm']));
$email =htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Email']));
$firstname =htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FName']));
$middlename = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['MName']));
$lastname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LName']));
$gender=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['gender']));
$pass=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['password']));
$user_r=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserRole']));
$date=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DateE']));
$ft=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FT']));
$fid=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmID']));
$emailo =htmlspecialchars(mysqli_escape_string($localhost2,$_POST['OEmail']));

$_SESSION['MM_Username'] = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Session']));

if (isset($_SESSION['MM_Username'])) {
	$FarmType="";
	foreach ($_POST['FarmType'] as $value) {
		$FarmType .= $value.", ";
	}
	$Responsibility="";
	foreach ($_POST['Responsibility'] as $value) {
		$Responsibility .= $value.", ";
	}
	
	if ($insert=$localhost2->query("INSERT INTO users(FarmID,Username,Email,Password,Gender,FName,MName, 
		LName,UserRole,Farm_Token,JobTitle,FarmName,Date_Employed,WFarmType) 
		VALUES('$fid','$user','$email','$pass','$gender','$firstname','$middlename','$lastname','$user_r','$ft','$Responsibility','$farm','$date','$FarmType')")) {
		if (isset($_POST['OEmail'])) {

			$emailo =htmlspecialchars(mysqli_escape_string($localhost2,$_POST['OEmail']));
			$email =htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Email']));
			$user = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UName']));
			$pass=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['password']));

			$header= array(
				'print_r($emailo);',
				'Content-Type:text/html'
				);

			$body='<h2>Your Employement Details</h2> 
			print_r($emailo)';
			;

			$to = "$email";
			$subject = 'Your username & password';
			$message = "username:$user\r\n password:$pass";
			$headers = "$emailo";
			mail($to, $subject, $message, $headers);
			mail("$emailo",'Employee Details',$body,implode("\r\n", $header));
			echo '<script>alert("New Employee Added!!")
			var newLocation ="../UserPanel/Newfwork.php";
			window.location = newLocation;</script>';

		}
		else
			echo '<script>alert("Missing Sender Email, You Must have an Email!!")
		var newLocation ="../UserPanel/Newfwork.php";
		window.location = newLocation;</script>';


	}
	else
		echo '<script>alert("Sorry an Error Occured, Please try again!!")
	var newLocation ="../UserPanel/Newfwork.php";
	window.location = newLocation;</script>';
}

echo '<script>alert("Opps!! Session Expired...Please try again")
var newLocation ="../UserPanel/Newfwork.php";
window.location = newLocation;</script>';



?>