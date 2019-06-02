<?php
session_start();
error_reporting(0);
include('../Connections/connect.php');
if (isset($_POST['sess'])) {

	if (isset($_POST['FarmID'])) {

		$cid='0';
		$fid='0';
		$use = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Usage']));
		$use1 = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Usage1']));
		$unitu = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitU']));
		$unitu1 = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UnitU1']));
		$pid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PAName']));
		$pdname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['PDName']));
		$mname = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['Mname']));
		$mcat = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['MCat']));
		$cid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['ChemName']));
		$fid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FeedName']));
		$farmid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['FarmID']));
		$userid = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserID']));
		$usename = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['UserN']));
		$ddate = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['DDate']));
		$lcost = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['LCost']));
		$ecost = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['ECost']));
		$miscost = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['MisCost']));
		$tcost = htmlspecialchars(mysqli_escape_string($localhost2,$_POST['TCost']));
echo "$pid";
		$query="SELECT * from farming where FarmID='$farmid' AND FarmingCategory='Livestock Farming' AND P_A_ID='$pid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $plants)  {
			$paid=$plants['P_A_ID'];
			$paname=$plants['P_Aname'];
			$pacost=$plants['PAcost'];
			$prcost=$plants['P_Rcost'];
			$paQQ=$plants['PAweight'];
			$unitw=$plants['UnitW'];
			$uname=$plants['Responsibility'];

		};

		$query="SELECT * from accounts where FarmID='$farmid' AND PA_ID='$paid'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $plants)  {
			$Mcost+=$plants['MaintainaceCost'];
			
		};	$ttmcost=$tcost+$Mcost;
		$pachem	="No Stock";
		$query="SELECT * from agrochemfeed where FarmID='$farmid' AND CFID='$cid' AND CFcategory='Chemical'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $plants)  {
			$c1=$plants['CFID'];
			$cfname=$plants['CFname'];
			$cfcat=$plants['CFcategory'];
			$utype=$plants['UsageType'];
			$ucat=$plants['UsageCategory'];
			$details=$plants['Details'];
			$dfu=$plants['DFU'];
			$uv=$plants['UnitV'];
			$cfcost=$plants['Cost'];
			$cfqq=$plants['Quantity'];
			$cfq=$plants['CFlevel'];
			$ucf=$plants['UsedCF'];
			$u2=$plants['Unit2'];
			$urate=$plants['UsageRate'];
			$datep=$plants['DatePurchased'];
			if ($u2=="Litres" AND $unitu=="Millilitres") {
				$usec=($use*0.001);
				$uamt=($cfq-$usec);
				$urem=($cfq-$usec);
				$ucfc=($usec+$ucf);
				
			}
			else if ($u2=="Millilitres" AND $unitu=="Litres") {
				$usec=($use*1000);
				$uamt=($cfq-$usec);
				$urem=($cfq-$usec);
				$ucfc=($usec+$ucf);

			}
			else if ($u2=="Kilogrames" AND $unitu=="Grams") {
				$usec=($use*0.001);
				$uamt=($cfq-$usec);
				$urem=($cfq-$usec);
				$ucfc=($usec+$ucf);

			}
			else if ($u2=="Grams" AND $unitu=="Kilogrames") {
				$usec=($use*1000);
				$uamt=($cfq-$usec);
				$urem=($cfq-$usec);
				$ucfc=($usec+$ucf);
				
			}
			else   {
				$usec=($use*1);
				$uamt=($cfq-$usec);
				$urem=($cfq-$usec);
				$ucfc=($usec+$ucf);

			};
			
		};
		$pafeed="No Stock";
		$query="SELECT * from agrochemfeed where FarmID='$farmid' AND CFID='$fid' AND CFcategory='Supplement'";
		$results=mysqli_query($localhost2, $query);
		foreach ($results as $plants)  {
			$f1=$plants['CFID'];
			$cfname1=$plants['CFname'];
			$cfcat1=$plants['CFcategory'];
			$utype1=$plants['UsageType'];
			$ucat1=$plants['UsageCategory'];
			$details1=$plants['Details'];
			$dfu1=$plants['DFU'];
			$uv1=$plants['UnitV'];
			$cfcost1=$plants['Cost'];
			$cfqq1=$plants['Quantity'];
			$cfq1=$plants['CFlevel'];
			$ucf1=$plants['UsedCF'];
			$u21=$plants['Unit2'];
			$urate1=$plants['UsageRate'];			
			$datep1=$plants['DatePurchased'];
			if ($u21=="Litres" AND $unitu1=="Millilitres") {
				$usef=($use1*0.001);
				$uamt1=($cfq1-$usef);
				$urem1=($cfq1-$usef);
				$ucff=($usef+$ucf1);

			}
			else if ($u21=="Millilitres" AND $unitu1=="Litres") {
				$usef=($use1*1000);
				$uamt1=($cfq1-$usef);
				$urem1=($cfq1-$usef);
				$ucff=($usef+$ucf1);

			}
			else if ($u21=="Kilogrames" AND $unitu1=="Grams") {
				$usef=($use1*0.001);
				$uamt1=($cfq1-$usef);
				$urem1=($cfq1-$usef);
				$ucff=($usef+$ucf1);
				
			}
			else if ($u21=="Grams" AND $unitu1=="Kilogrames") {
				$usef=($use1*1000);
				$uamt1=($cfq1-$usef);
				$urem1=($cfq1-$usef);
				$ucff=($usef+$ucf1);
				
			}
			else   {
				$usef=($use1* 1);
				$uamt1=($cfq1-$usef);
				$urem1=($cfq1-$usef);
				$ucff=($usef+$ucf1);

			};


		};
	
			if ($update=$localhost2->query("UPDATE agrochemfeed SET PA_ID='$paid',Responsibility='$usename',UsageCF='$usec',UnitU='$unitu',CFlevel='$uamt',UsedCF='$ucfc',PAname='$paname' WHERE CFID='$c1'")) {
				if ($update=$localhost2->query("UPDATE farming SET PDName='$pdname',MaintainaceName='$mname',PAchem='$cfname',PAchemID='$c1',MaintainaceCost='$ttmcost',MaintainaceDate='$ddate' WHERE P_A_ID='$paid'")) {


					if ($update=$localhost2->query("UPDATE agrochemfeed SET PA_ID='$paid',Responsibility='$usename',UsageCF='$usef',UnitU='$unitu1',CFlevel='$uamt1',UsedCF='$ucff',PAname='$paname' WHERE CFID='$f1'")) {
						if ($update=$localhost2->query("UPDATE farming SET PDName='$pdname',MaintainaceName='$mname',PAfeed='$cfname1',PAfeedID='$f1',MaintainaceCost='$ttmcost',MaintainaceDate='$ddate' WHERE P_A_ID='$paid'")) {

							if ($insert=$localhost2->query("INSERT INTO accounts(FarmID,UserID,UserName,Responsibility,PA_ID,PAname,Quantity,UnitQ,Cname,Fname,C_ID,F_ID,MaintainaceName,UsageAmountC,UsageAmountF,UnitC,UnitF,Category,dDate,LabourCost,EquipmentCost,MisCost,MaintainaceCost,TMaintainaceCost,Ccost,Fcost) 
								VALUES('$farmid','$userid','$uname','$usename','$paid','$paname','$paQQ','$unitw','$cfname','$cfname1','$c1','$f1','$mname','$usec','$usef','$unitu','$unitu1','$mcat','$ddate','$lcost','$ecost','$miscost','$tcost','$ttmcost','$cfcost','$cfcost1')")) {
								echo '<script>alert("Record Added Successfully!!!")
							var newLocation ="../UserPanel/Livestock.php";
							window.location = newLocation;</script>';
						}else
						echo '<script>alert("Record Insert error1. Please Try again!!!")
						var newLocation ="../UserPanel/Livestock.php";
						window.location = newLocation;</script>';



					}else
					echo '<script>alert("Record Insert error2. Please Try again!!!")
					var newLocation ="../UserPanel/Livestock.php";
					window.location = newLocation;</script>';




				}else
				echo '<script>alert("Record Insert error3. Please Try again!!!")
				var newLocation ="../UserPanel/Livestock.php";
				window.location = newLocation;</script>';




			}else
			echo '<script>alert("Record Insert error4. Please Try again!!!")
			var newLocation ="../UserPanel/Livestock.php";
			window.location = newLocation;</script>';
		}else
		echo '<script>alert("Record Insert error5. Please Try again!!!")
		var newLocation ="../UserPanel/Livestock.php";
		window.location = newLocation;</script>';
	
}
else
	echo '<script>alert("Missing Farm Token. Please select a Farm Profile and Try again!!!")
var newLocation ="../UserPanel/Livestock.php";
window.location = newLocation;</script>';
}
else
	echo '<script>alert("You are not logged in please login to proceed")
var newLocation = "../UserPanel/login.php";
window.location = newLocation;</script>';




?>