<?php
require_once("../Connections/dbcontroller.php");
$db_handle = new DBController();


if(!empty($_POST["Email"])) {
  $result = mysql_query("SELECT count(*) FROM users WHERE Email='" . $_POST["Email"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'>Email Not Available.</span>";
  }else{
      echo "<span class='status-available'>Email Available.</span>";
  }
}
?>