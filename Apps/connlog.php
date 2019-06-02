<?php require_once('../Connections/connect.php'); 
session_start();

$_SESSION['MM_Username']="farmer";
$colname_UserConn = "-1";
if (isset($_SESSION['MM_Username'])) {

	$user = $_SESSION['MM_Username'];
	$error1="Could not complete the login request";
	$query= $localhost2->query("SELECT * FROM users WHERE Username = $user");
	$row=$query->db2_fetch_assoc();




	if ($row['UserRole']=="Farm Owner")
	{


		header("location:../UserPanel/UserDash.php");
		exit;
	}
	elseif($row['UserRole']=="Farm Worker")
	{
		if ($row['Farm_Token']!='') {
			header("location:../UserPanel/UserDash2.php");
			exit;
		}
		else
			header("location:../UserPanel/confirmation.php");

		
	}
	elseif($row['UserRole']=="Farm Supervisor")
	{


		if ($row['Farm_Token']!='') {
			header("location:../UserPanel/UserDash1.php");
			exit;
		}
		else
			header("location:../UserPanel/confirmation.php");
	}
	
	
	else{
		echo '<script>alert("Unauthorized user Access \n You Do not have permission to view this page")
		var newLocation = "../UserPanel/login.php";
		window.location = newLocation;</script>';

		

	}


	$localhost2->close();	

}


?>
