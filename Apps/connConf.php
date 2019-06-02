<?php
if (!isset($_SESSION)) {
	session_start();
}

error_reporting(E_ALL);
include('../Connections/connect.php');


$loc = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Location']));
$nagoz = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PNum']));
$Token = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FToken']));
$usersess=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['usersess']));
$date=htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DateE']));


$_SESSION['MM_Username'] = $usersess;

if($_SESSION['MM_Username']!=""){
	$user=$_SESSION['MM_Username'] ;
	$query = "SELECT * FROM users where Username ='$user'";
	$result = $localhost2->query($query);
	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {

			$UserRole=$row['UserRole'];
			$_SESSION['MM_UserRole']=$UserRole;
			$sessionID= $_SESSION['MM_UserRole'];
			$query= "SELECT * FROM farm where Farm_Token ='$Token'";
			$results=mysqli_query($localhost2, $query);
			foreach ($results as $farms)  {
				$fName=$farms['FarmName'];
				$fid=$farms['FarmID'];

				if (isset($_POST['usersess'])) {

					if ($update=$localhost2->query("UPDATE users SET Farm_Token='$Token',FarmName='$fName',OLocation='$loc',PhoneNo='$nagoz',Date_Employed='$date',FarmID='$fid' WHERE Username='$user'")) {
						if ($sessionID=="Farm Worker") {
							header("location:../UserPanel/UserDash2.php");
							exit;
						}
						elseif ($sessionID=="Farm Supervisor") {
							header("location:../UserPanel/UserDash1.php");
							exit;
						}
						else{
							echo '<script>alert("User Role Not Defined Please Login to Proceed")
							var newLocation = "../UserPanel/login.php";
							window.location = newLocation;</script>';
						};



					}
					else
					{
						echo '<script>alert("Opps!! some might have gone wrong. Please try again")
						var newLocation ="login.php.php";
						window.location = newLocation;</script>';
					}

				}
				else
					echo '<script>alert("Opps!! Session Expired. Please try again")
				var newLocation ="login.php.php";
				window.location = newLocation;</script>';
			} } } ;
		}
		else
			echo '<script>alert("You are not logged in please login to proceed")
		var newLocation = "login.php";
		window.location = newLocation;</script>';
		?>