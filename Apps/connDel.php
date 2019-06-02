<?php

include_once('../Connections/localhost.php');


if(isset($_GET['Fid'])){
	$fid=$_GET['Fid'];
	


$sql = "DELETE FROM farm where FarmID=$fid";


mysql_query($sql,$localhost1);
header("location:../UserPanel/tables/farmstlb.php");
exit;

}
if(isset($_GET['CFcid'])){
	$cfid=$_GET['CFcid'];
	


$sql = "DELETE FROM agrochemfeed  where CFID=$cfid";


mysql_query($sql,$localhost1);
header("location:../UserPanel/tables/chemtlb.php");
exit;

}
if(isset($_GET['UID'])){
	$uid=$_GET['UID'];
	


$sql = "DELETE FROM users  where UserID=$uid";


mysql_query($sql,$localhost1);
header("location:../UserPanel/tables/employeetlb.php");
exit;

}
if(isset($_GET['PAID'])){
	$paid=$_GET['PAID'];
	


$sql = "DELETE FROM farming  where P_A_ID=$paid";


mysql_query($sql,$localhost1);
header("location:../UserPanel/tables/tableH.php");
exit;

}
?>