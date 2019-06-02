<?php

error_reporting(0);
include('../Connections/connect.php');
session_start();

$loc = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['mtaa']));
$token = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Token']));
$ft = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmT']));
$fname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmName']));
$frn = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmRegNo']));
$efi = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['EFInput']));
$efo = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['EFOutput']));
$efp = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['EMProfit']));
$fid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmID']));
$uname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UName']));
if ($_POST['Token']==$ft) {
$_SESSION['MM_Username'] = $uname;
if ($update=$localhost2->query("UPDATE farm SET FarmName='$fname',UserName='$uname',FarmRegNo='$frn',EFInput='$efi',EFOutput='$efo',EFProfit='$efp',FarmLocation='$loc' WHERE FarmID='$fid'")) {
	echo '<script>alert("Details Updated Successfully!!!")
	var newLocation = "../UserPanel/tables/farmstlb.php";
	window.location = newLocation;</script>';


}
else

	echo '<script>alert("Opps!! some might have gone wrong. Please try again")
	var newLocation = "../UserPanel/tables/farmstlb.php";
	window.location = newLocation;</script>';

}
else

	echo '<script>alert("Error!!! Cannot Update. Wrong/Misspelled Token Please try again")
	var newLocation = "../UserPanel/tables/farmstlb.php";
	window.location = newLocation;</script>';


