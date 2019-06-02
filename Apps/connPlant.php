<?php
session_start();
error_reporting(E_ALL);
include('../Connections/connect.php');
if (isset($_POST['FarmID'])) {

if (isset($_POST['PName'])) {
	$useid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));
	$usename = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserN']));
	$pname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PName']));
	$fcat = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FCat']));
	$pacat = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PACat']));
	$ctype = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['CType']));

	$species = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Species']));
	$pcost = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PCost']));
	$area = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PArea']));
	$weight = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PlWeight']));
	$dateb = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DateB']));
	$fid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmID']));
	$unita = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitA']));
	$unitw = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitW']));




if ($insert=$localhost2->query("INSERT INTO farming(FarmID,UserID,P_Aname,PAcategory,Breed_Species,FarmingCategory,PAtype,PAsetupArea,UnitA,PAweight,UnitW,PAcost,Responsibility,PRdate) VALUES('$fid','$useid','$pname','$pacat','$species','$fcat','$ctype','$area','$unita','$weight','$unitw','$pcost','$usename','$dateb')")) {
	echo '<script>alert("Crop Successfully added to the Farm")
var newLocation ="../UserPanel/Farmset.php";
window.location = newLocation;</script>';
	
}
else
	echo '<script>alert("Crop Planting error. Please Try again!!!")
var newLocation ="../UserPanel/Farmset.php";
window.location = newLocation;</script>';

}
else echo '<script>alert("Missing Crop Name. Please Check and Try again!!!")
var newLocation ="../UserPanel/Farmset.php";
window.location = newLocation;</script>';


}
else
	echo '<script>alert("Missing Farm Token. Please select a Farm Profile and Try again!!!")
var newLocation ="../UserPanel/Farmset.php";
window.location = newLocation;</script>';






?>