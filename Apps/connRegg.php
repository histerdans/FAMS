<?php
if (!isset($_SESSION)) {
	session_start();
}

error_reporting(0);
include('../Connections/connect.php');


$FarmName = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmName']));
$uname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserN']));
$FarmRegNo =htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmRegNo']));
$FarmOFN = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmOFN']));
$FLocation = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FLocation']));
$FarmSize=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmSize']));
$Farm=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Farm']));
$EFInput=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['EFInput']));
$EFOutput=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['EFOutput']));
$EMProfit=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['EMProfit']));
$UserID=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));
$UnitFS=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitFS']));
$UserRole=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserRole']));
$usersess=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['usersess']));
$ranStr = md5(microtime());

$Farm_Token = substr($ranStr, 0, 6);


$_SESSION['MM_Username'] = $usersess;
if (isset($_POST['usersess'])) {
	$FarmType="";
	foreach ($_POST['FarmType'] as $value) {
		$FarmType .= $value.", ";
	}

	if ($insert=$localhost2->query("INSERT INTO farm(Farm_Token,UserID,UserRole,UserName,FarmName,FarmRegNo,FarmType,FarmSize,UnitFS, 
		FarmOFN,FarmLocation,FarmByType,EFInput,EFOutput,EFProfit) 
		VALUES('$Farm_Token','$UserID','$UserRole','$uname','$FarmName','$FarmRegNo','$Farm','$FarmSize','$UnitFS','$FarmOFN','$FLocation','$FarmType','$EFInput','$EFOutput','$EMProfit')")) {
		$update=$localhost2->query("UPDATE users SET Farm_Token='$Farm_Token',FarmName='$FarmName' WHERE UserID='$UserID'");
	echo '<script>alert("Registration Successfully")
	var newLocation ="../UserPanel/UserDash.php";
	window.location = newLocation;</script>';
}



else

	echo '<script>alert("Opps!! Error1 Something might have gone wrong.Please try again")
	var newLocation ="../UserPanel/Register.php";
	window.location = newLocation;</script>';

}



else

	echo '<script>alert("Opps!! Error2 Something might have gone wrong. Please try again")
	var newLocation ="../UserPanel/NewFarm.php";
	window.location = newLocation;</script>';



?>