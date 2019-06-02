<?php
session_start(0);

error_reporting(E_ALL);
include('../Connections/connect.php');
if (isset($_POST['FarmID'])) {

if (isset($_POST['LName'])) {

	$useid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));
	$usename = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserN']));
	$lname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LName']));
	$fcat = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Fcat']));
	$pacat = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PACat']));
	$ltype = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LType']));
	$gen = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['gender']));
	$age = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LAge']));
	$breed = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LBreed']));
	$cost = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LCost']));
	$area = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Area']));
	$stat = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LStatus']));
	$pop = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Lpop']));
	$dateb = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DateB']));
	$fid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmID']));
	$unita = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitA']));
	$unitd = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitD']));
	$scost = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['SCost']));
	$uw="Head Count";


		if ($insert=$localhost2->query("INSERT INTO farming(FarmID,UserID,P_Aname,PAcategory,Breed_Species,FarmingCategory,PAtype,PAsetupArea,UnitA,Responsibility,P_Rcost,PAcost,PRdate,Gender,Population,UnitW,Age,UnitD,Status) VALUES('$fid','$useid','$lname','$pacat','$breed','$fcat','$ltype','$area','$unita','$usename','$scost','$cost','$dateb','$gen','$pop','$uw','$age','$unitd','$stat')")) {

	echo '<script>alert("Breed Successfully added to the Farm")
var newLocation ="../UserPanel/Aniset.php";
window.location = newLocation;</script>';
	
}
else
	echo '<script>alert("Breed insert error. Please Try again!!!")
var newLocation ="../UserPanel/Aniset.php";
window.location = newLocation;</script>';
}
else echo '<script>alert("Missing Animal Name. Please Check and Try again!!!")
var newLocation ="../UserPanel/Farmset.php";
window.location = newLocation;</script>';
}
else
	echo '<script>alert("Missing Farm Token. Please select a Farm Profile and Try again!!!")
var newLocation ="../UserPanel/Aniset.php";
window.location = newLocation;</script>';






?>