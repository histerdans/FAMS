
<?php
session_start();
require_once '../Connections/connect.php';


if (isset($_POST['Username'])) {

 
 $user = strip_tags($_POST['Username']);
 $password = strip_tags($_POST['Password']);
$_SESSION['MM_Username']=$user;

 
 $query = $localhost2->query("SELECT Username, Password FROM users  WHERE Username='$user'");
 $row=$query->fetch_assoc();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 
 if (password_verify($password, $row['Password']) && $count==1) {
  header("Location: conlogO.php");
  
 } else {
 header("Location: connlog.php");
 }
 $localhost2->close();
}
?>
