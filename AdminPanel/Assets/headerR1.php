
<?php 
error_reporting();
require_once('../Connections/localhost.php');
require_once('../Connections/connect.php'); ?>
<?php

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  $_SESSION['MM_projectid']=NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
  unset($_SESSION['MM_projectid']);

  
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
//initialize the session
if (!isset($_SESSION)) {
  session_start();



}

if($_SESSION['MM_Username']!=""){ 
 $FID=$_SESSION['mm_FID']; 
 $user=$_SESSION['MM_Username'] ;

 $query = "SELECT * FROM users where Username ='$user'";
 $result = $localhost2->query($query);
 if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    $User=$row['UserRole'];
    $UserRole=$row['UserRole'];
    $fname=$row['FName'];
    $lname=$row['LName'];
    $_SESSION['MM_UserRole']=$UserRole;
    $sessionID= $_SESSION['MM_UserRole'];
    $_SESSION['UID']=$row['UserID'];
    $usid=$row['UserID'];




  }}}

  $faname="................";
  $query="SELECT * from farm where FarmID='$FID'";
  $results=mysqli_query($localhost2, $query);
  foreach ($results as $farms)  {
   $faname=$farms['FarmName'];
 }
 include_once('../Connections/localhost.php'); 
 $comp="No Messages";
 $resultc = mysql_query("SELECT * FROM chats where Comment ='' AND UserID=$usid;");
 $comp =mysql_num_rows($resultc);
 ?>

 <div class="col-md-3 left_col">
  <div class="left_col scroll-view">

    <div class="navbar nav_title" style="border: 0;">
      <a href="#" class="site_title"><i class="fa fa-tree"></i> <span>FaMS<span style=" font-size: 10px;">™</span></span></a>
    </div>
    <div class="clearfix"></div>

    <!-- menu prile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="../Assets/images/user.png" alt="..." class="img-circle profile_img">
      </div>

    </div>
    <!-- /menu prile quick info -->
    <div class="profile_info">
      <span>Welcome,<?php echo $user;?></span>
      <h2><small style="color: #ffffff;">Logged in as</small> :<?php echo $UserRole;?></h2><div style="color:#efd506;">Today&nbsp;<i class=" fa fa-calendar"></i><span><?php $dt = new DateTime();?>
      <br/> <b> <?php echo $dt->format('l d, M,Y');?> </b></span></div>

    </div> <div class="clearfix"></div>
    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li> <?php echo "<a  href=\"../UserPanel/UserDash.php?FID=$FID\">"; ?> <i class="fa fa-home"></i>Dashboard<span class="fa fa-long-arrow-left"></span><?php echo "</a>";?>

          </li>
          <li><a><i class="fa fa-edit"></i> Farming <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
            <?php 
                   $query = "SELECT * FROM farm where UserID ='$usid' AND FarmID='$FID' AND FarmByType LIKE '%Horticulture%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 {
               echo "<li><a  href=\"Hotifam.php?FID=$FID\">"; ?> Horticulture<?php echo "</a>";}?></li>
             <?php 
                   $query = "SELECT * FROM farm where UserID ='$usid' AND FarmID='$FID' AND FarmByType LIKE '%Livestock%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 { echo "<li><a  href=\"Livestock.php?FID=$FID\">"; ?> Livestock Farming<?php echo "</a></li>";}?>
              <?php 
                   $query = "SELECT * FROM farm where UserID ='$usid' AND FarmID='$FID' AND FarmByType LIKE '%Fish%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 { echo "<li><a  href=\"Fish.php?FID=$FID\">"; ?> Fish Farming <?php echo "</a></li>";}?>
               <?php 
                   $query = "SELECT * FROM farm where UserID ='$usid' AND FarmID='$FID' AND FarmByType LIKE '%Poultry%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 { echo "<li><a  href=\"Poutry.php?FID=$FID\">"; ?> Poultry Farming <?php echo "</a></li>";}?>
               <?php 
                   $query = "SELECT * FROM farm where UserID ='$usid' AND FarmID='$FID' AND FarmByType LIKE '%Seed%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 { echo "<li><a  href=\"Cereals.php?FID=$FID\">"; ?> Seed Production <?php echo "</a></li>";}?>
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> Farm Management <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
              <li><?php echo "<a  href=\"Newfwork.php?FID=$FID\">"; ?> Add New Farm Worker<?php echo "</a>";?></li>
              <li> <?php echo "<a  href=\"Agrochem.php?FID=$FID\">"; ?> Agro Chemicals<?php echo "</a>";?></li>
              <li><?php echo "<a  href=\"Agrofeed.php?FID=$FID\">"; ?> Agro Supplements<?php echo "</a>";?></li>
              <li>  <?php echo "<a  href=\"Restock.php?FID=$FID\">"; ?> Restock Feeds & Chemicals<?php echo "</a>";?></li>
              <li>  <?php echo "<a  href=\"contacts.php?FID=$FID\">"; ?> Employee Contacts<?php echo "</a>";?></li>
            </ul>
          </li>
          <li><a><i class="fa fa-calculator"></i> Farm Accounts <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
              <li><?php echo "<a  href=\"Paywork.php?FID=$FID\">"; ?> Pay Workers<?php echo "</a>";?></li>
              <li><?php echo "<a  href=\"Accounts.php?FID=$FID\">"; ?> Farm Accounting<?php echo "</a>";?></li>
               <li><?php echo "<a  href=\"CashFlow.php?FID=$FID\">"; ?> Farm Cash Flow<?php echo "</a>";?></li>
             
            </ul>
          </li>
          <li><a><i class="fa fa-wrench"></i> SetFarm <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
              <li><?php echo "<a  href=\"Farmset.php?FID=$FID\">"; ?> Planting Setting<?php echo "</a>";?></li>
              <li> <?php echo "<a  href=\"Aniset.php?FID=$FID\">"; ?> Rearing Setting<?php echo "</a>";?></li>
            </ul>
          </li>

        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
     
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo $logoutAction ;?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>








<!-- top navigation -->
<div class="top_nav">

  <div class="nav_menu">
    <nav class="" role="navigation">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div><label style="position: relative;top: 13px; left: 40px;font-size: 20px"><h2 class=" bg-green">Farm Management System</h2> </label>
      <label style="position:absolute;top: 13px; left: 640px;font-size: 20px"><h2 class=" bg-green"><?php echo $faname;?> Farm</h2> </label>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../Assets/images/user.png" alt=""><?php echo $fname?> <?php echo$lname?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <li><a href="YProfile1.php">  Profile</a>
            </li>

           
            <li><a href="<?php echo $logoutAction ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </li>
          </ul>
        </li>


        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green"><?php echo $comp;?></span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">

            <?php
            
          
            $query="SELECT * from chats where UserID='$usid'";
            $result = $localhost2->query($query);
            if ($result->num_rows > 0) {

              while($chats = $result->fetch_assoc()) {
                $un=$chats['Username'];
                $Msg=$chats['Message'];
                $time= $chats['TimeSent'];
                $_GET['chat']=$chats['ChatID'];
                $cid=$_GET['chat'];

                ?>

                <li>
                  <a data-toggle="modal" data-target="#Reply">
                    <span class="image">
                      <img src="../Assets/images/user.png" alt="Profile Image" />
                    </span>
                    <span>
                      <span><?php echo $un; ?></span>
                      <span class="time"><?php echo $time;?></span>
                    </span>
                    <span class="message">
                     <?php echo $Msg;?>
                   </span>
                 </a>

               </li>
               <?php }}?>
               <li>
                
               </li>
             </ul>
           </li>


         </ul>
       </nav>
     </div>

   </div>
   <!-- /top navigation -->
   <div id="Reply" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" >
      <div class="modal-content" >
        <?php
        $query="SELECT * from chats where ChatID='$cid'";
        $results=mysqli_query($localhost2, $query);
        foreach ($results as $chat)  {
          $Una=$chat['Username'];
          $msg=$chat['Message'];
          $dtt=$chat['TimeSent'];

        }

        ?>

        <form id="demo-form2" data-parsley-validate  action="../Apps/connprof.php" name="LoginForm"  method="POST" style="padding: 50px;padding-top:5px; ">
          <h3 style="color: #0aada3;">Reply Messages From; <h5><label style="color: #0aada3;"><?php echo $Una;?></label></h5></h3>  
          <input type="hidden" id="UserID" class="form-control" name="UserID" value="<?php echo $uid;?>" />

          <div class="item form-group">
            <label for="fname" style="color: #0aada3;">Message * :</label>&nbsp;&nbsp; &nbsp;&nbsp;<label id="fname" style="color: #0aada3;"><?php echo $msg;?></label>
          </div>
          <div class="item form-group">
            <label for="fname" style="color: #0aada3;">Time Posted</label>&nbsp;&nbsp; &nbsp;&nbsp;<label id="fname" style="color: #0aada3;"><?php echo $dtt;?></label>
          </div>
          <div class="item form-group col-md-7">
            <label for="LStatus" style="color: #0aada3;">Reply.</label>
            <textarea id="LStatus" required="required" class="form-control" name="reply" data-parsley-trigger="keyup" data-parsley-minlength="7" data-parsley-maxlength="250" data-parsley-minlength-message="Please enter Your Home location Address..i.e Postal Address or Location Fullnames"
            data-parsley-validation-threshold="10"></textarea>
          </div>
          <div class="item form-group col-md-7 pull-right">
           <button type="submit" class="btn btn-success btn-sm" name="send"><i class="fa fa-update"></i>Send</button>
           <button type="#" class="btn btn-primary btn-sm antoclose" data-dismiss="modal">Cancel</button>
         </div>



       </form>




     </div>
   </div>
 </div>