<?php
session_start();

error_reporting(E_ALL);
include('../Connections/connect.php');
if (isset($_POST['FarmID'])) {

if (isset($_POST['CName'])) {

	$cfcat = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['CFCat']));
	$cname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['CName']));
	$utype = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UType']));
	$ucat = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UCat']));
	$details = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Details']));
	$dfu = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DFU']));
	$unitv = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitV']));
	$unit2 = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Unit2']));
	$solv = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Solvent']));
	$rate = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['URate']));
	$cost = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['ChemCost']));
	$dateb = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DateB']));
	$datep = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DateP']));
	$fid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmID']));
	$cvol = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['CVol']));
	$uid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));
	$usename = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserN']));


	if ($insert=$localhost2->query("INSERT INTO agrochemfeed(FarmID,UserID,CFname,CFcategory,UsageType,UsageCategory,Details,DFU,Quantity,UnitV,UsageRate,CFlevel,Solvent,Unit2,DatePurchased,Dated,Cost) 
		VALUES('$fid','$uid','$cname','$cfcat','$utype','$ucat','$details','$dfu','$cvol','$unitv','$rate','$cvol','$solv','$unit2','$datep','$dateb','$cost')")) {

	echo '<script>alert("Feed Successfully added to the Farm Store")
var newLocation ="../UserPanel/Agrofeed.php";
window.location = newLocation;</script>';
	
}
else
	echo '<script>alert("Feed insert error. Please Try again!!!")
var newLocation ="../UserPanel/Agrofeed.php";
window.location = newLocation;</script>';
}
else echo '<script>alert("Missing Feed Name. Please Check and Try again!!!")
var newLocation ="../UserPanel/Agrofeed.php";
window.location = newLocation;</script>';
}
else
	echo '<script>alert("Missing Farm Token. Please select a Farm Profile and Try again!!!")
var newLocation ="../UserPanel/Agrofeed.php";
window.location = newLocation;</script>';






?>