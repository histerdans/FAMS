<?php
session_start();
error_reporting();
include('../Connections/connect.php');
if (isset($_POST['sess'])) {
	$tcf=0;
	$spp=0;
	$tttp=0;
	$sdt=0;
	$tmcost=0;
	$sal=0;
	$tspp=0;
	if (isset($_POST['FarmID'])) {
		$pid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PAName']));
		$farmid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmID']));
		$userid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));
		$usern = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserN']));
		$qty = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Quantity']));
		$unitq = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitQ']));
		$bname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['bName']));
		$cpu = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['cpu']));
		$sprice = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['sPrice']));
		$stype = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['SellType']));
		$sdate = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['sDate']));
		

		$query="SELECT * from farming where FarmID='$farmid' AND FarmingCategory='Seed Production' AND P_A_ID='$pid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $plants)  {
			$paid=$plants['P_A_ID'];
			$paname=$plants['P_Aname'];
			$pacost=$plants['PAcost'];
			$farmid=$plants['FarmID'];
			$pacost=$plants['PAcost'];
			$prcost=$plants['P_Rcost'];
			$paQQ=$plants['PAweight'];
			$unitw=$plants['UnitW'];
			$uname=$plants['Responsibility'];
			$yield=$plants['TotalYield'];
			$mcost=$plants['MaintainaceCost'];
			$pacat=$plants['PAcategory'];

		};


		
		$y=$yield-$qty;$query="SELECT * from agrochemfeed where FarmID='$farmid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $agrochemfeed)  {
			$tcf +=$agrochemfeed['Cost'];


		};	
		$query="SELECT * from accounts where FarmID='$farmid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $accounts)  {
			$tmcost +=$plants['MaintainaceCost'];
			

		};
			$query="SELECT * from users where FarmID='$farmid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $users)  {
		
			$sal +=$users['Salary'];

		};
		$ttmcost=$tmcost+$tcf+$sal;
		$texp=$mcost+$pacost+$tcf;
		$query="SELECT * from sells where FarmID='$farmid' AND ProductID='$paid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $sells)  {
			$spp +=$sells['sPrice'];
			$ttp =$sells['TotalProfit'];
		};
		$query="SELECT * from sells where FarmID='$farmid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $sells)  {
			$tspp +=$sells['sPrice'];

		};
		$tssp=$tspp+$sprice;
		$query="SELECT * from sells where FarmID='$farmid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $sells)  {
			$tttp +=$sells['TotalProfit'];
		};
		$query="SELECT * from sells where FarmID='$farmid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $sells)  {
			$tttp +=$sells['TotalProfit'];
		};
		$tsp=($spp+$sprice);
		$profit=($tsp-$texp)+$ttp;
		$tttp=$tssp-$ttmcost;
		
		if ($_POST['PAName']!="Null" AND $yield!=0) {
			
			if ($insert=$localhost2->query("INSERT INTO sells(FarmID,CommodityName,PAcategory,Product,ProductID,BuyerName,Responsibility,sDate,CPU,sPrice,Quantity,UnitQ,TotalExpenditure,TotalRevenue,TotalProfit,TTProfits,TTRev,TExp) 
				VALUES('$farmid','$paname','$pacat','$stype','$paid','$bname','$usern','$sdate','$cpu','$sprice','$qty','$unitq','$texp','$tsp','$profit','$tttp','$tssp','$ttmcost')")) {
				if ($update=$localhost2->query("UPDATE farming SET TotalYield='$y' WHERE P_A_ID='$paid'")) {
					echo '<script>alert("Record Added Successfully!!!")
					var newLocation ="../UserPanel/Cereals.php";
					window.location = newLocation;</script>';
				}
				echo '<script>alert("Record Insert error1. Please Try again!!!")
				var newLocation ="../UserPanel/Cereals.php";
				window.location = newLocation;</script>';
			}
			echo '<script>alert("Record Insert error2. Please Try again!!!")
			var newLocation ="../UserPanel/Cereals.php";
			window.location = newLocation;</script>';

		}
		else
			echo '<script>alert("Error4!!! Harvesting Has not been done on this crop")
		var newLocation ="../UserPanel/Cereals.php";
		window.location = newLocation;</script>';

	}
	else
		echo '<script>alert("Missing Farm Definer. Please select a Farm Profile and Try again!!!")
	var newLocation ="../UserPanel/Cereals.php";
	window.location = newLocation;</script>';
}
else
	echo '<script>alert("You are not logged in please login to proceed")
var newLocation = "../UserPanel/login.php";
window.location = newLocation;</script>';




?>