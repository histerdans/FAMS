 
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
if($_SESSION['MM_Username']!=""){
  $UserRole="Guest Farmer";
  $fname="Guest";
  $lname="Farmer";
  $user=$_SESSION['MM_Username'] ;
  $query = "SELECT * FROM users where Username ='$user'";
  $result = $localhost2->query($query);
  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     
      $UserRole=$row['UserRole'];
      $fname=$row['FName'];
      $lname=$row['LName'];
      $usid=$row['UserID'];
      $_SESSION['MM_UserRole']=$UserRole;
      $sessionID= $_SESSION['MM_UserRole'];


      
    }}}
    
    include_once('../Connections/localhost.php'); 
    $comp="No Messages";
    $resultc = mysql_query("SELECT * FROM chats where Comment ='' AND UserID=$usid;");
    $comp =mysql_num_rows($resultc);

    ?>




    <div class="col-md-3 left_col in">
      <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border:4px;">
          <a href="#" class="site_title"><i class="fa fa-tree"></i> <span>FaMS<span style=" font-size: 10px;">™</span></span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
          <div class="profile_pic">
            <img src="../Assets/images/user.png" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info" style="width: 75%;">
            <span>Welcome,<?php echo $user;?></span>
            <h2><small style="color: #ffffff;">Logged in as</small> :<?php echo $UserRole;?></h2><div style="width:180px; color:#efd506;">Today&nbsp;<i class=" fa fa-calendar"></i><span><?php $dt = new DateTime();
            echo "<br/>";echo '<b>'.$dt->format('l d, M,Y').'</b>';?> </span></div>

          </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->


        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
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
          <div class="nav toggle ">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <label style="position: relative;top: 13px; left: 40px;font-size: 30px"><h2 class=" bg-green">Farm Management System</h2> </label>

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
                
           

                $query="SELECT * from chats where ReceiverID='$usid' order by TimeSent desc";
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
                     <?php echo "</a>";?>

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