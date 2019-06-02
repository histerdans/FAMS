<?php
include('../Connections/connect.php');
if (isset($_POST['sess'])) {

if (isset($_POST['FarmID'])) {
	$farmid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmID']));
	$userid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));
	$worker = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Name']));
	$ddate = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DDate']));
	$pay = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Pay']));

	$query="SELECT * from users where UserID='$userid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $user)  {
			$uname=$user['Username'];
			
	
		};
			$query="SELECT * from users where UserID='$worker'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $user)  {
			$urole=$user['UserRole'];
			$dateE=$user['Date_Employed'];
			$jtitle=$user['JobTitle'];
			$fname=$user['FName'];
			$lname=$user['LName'];
	
		};


if (isset($_POST['Name'])) {

if ($insert=$localhost2->query("UPDATE users SET Salary='$pay' WHERE UserID='$worker'")) {
		if ($insert=$localhost2->query("INSERT INTO salaries(FarmID,UserID,PDate,UserRole,Specification,Responsibility,Salary,Edate,FName,LName) 
				VALUES('$farmid','$userid','$ddate','$urole','$jtitle','$uname','$pay','$dateE','$fname','$lname')")) {
		echo '<script>alert("Payment Successfully")
var newLocation ="../UserPanel/Paywork.php";
window.location = newLocation;</script>';
}
else
	echo '<script>alert("Payment error1. Please Try again!!!")
var newLocation ="../UserPanel/Paywork.php";
window.location = newLocation;</script>';
}
else
	echo '<script>alert("Payment error2. Please Try again!!!")
var newLocation ="../UserPanel/Paywork.php";
window.location = newLocation;</script>';
}else
	echo '<script>alert("Payment error3. Please Try again!!!")
var newLocation ="../UserPanel/Paywork.php";
window.location = newLocation;</script>';

}
else
	echo '<script>alert("Missing Farm Token. Please select a Farm Profile and Try again!!!")
var newLocation ="../UserPanel/Paywork.php";
window.location = newLocation;</script>';
}
else
  echo '<script>alert("You are not logged in please login to proceed")
var newLocation = "../UserPanel/login.php";
window.location = newLocation;</script>';




?>