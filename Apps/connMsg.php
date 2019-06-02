<?php

error_reporting(E_ALL);
include('../Connections/connect.php');
session_start();


$see = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Sender']));
$ree = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Receiver']));
$comm = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Comment']));
$dt = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DateS']));
$un = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UName']));


if ($insert=$localhost2->query("INSERT INTO chats(UserID,Username,SenderID,ReceiverID,Message,DatePosted) VALUES('$ree','$un','$see','$ree','$comm','$dt')")) {
	echo '<script>alert("Message sent!!!")
var newLocation ="../UserPanel/contacts.php";
window.location = newLocation;</script>';
	
}
else
	echo '<script>alert("Error. Please Try again!!!")
var newLocation ="../UserPanel/contacts.php";
window.location = newLocation;</script>';
