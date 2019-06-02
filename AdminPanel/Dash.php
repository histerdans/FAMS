  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FaMS</title>

    <!-- Bootstrap core CSS -->

    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="../Assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../Assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../Assets/css/custom.css" rel="stylesheet">
    <link href="../Assets/css/icheck/flat/green.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../Assets/images/stamp.png">


    <script src="../Assets/js/jquery.min.js"></script>

    <!--[if lt IE 9]>
          <script src="../assets/js/ie8-responsive-file-warning.js"></script>
          <![endif]-->

          <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <script type="text/javascript">

              $(document).ready(function(s1){
                
               $("#CalenderModalNew").modal('show');
               

               

             });

           </script>
         </head>


         <body class="nav-md" >

          <div class="container body ">


            <div class="main_container">

             <?php   
               //initialize the session
             if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
             if (!isset($_SESSION)) {
              session_start();

              
            }  
            
            if($_SESSION['MM_Username']!=""){

              $FID='0';
              include("Assets/headerU.php");
              if($_SESSION['MM_Username']!=""){
                $faname=":( No Farm Has Been Selected";
                $user=$_SESSION['MM_Username'] ;
                $query = "SELECT * FROM users where Username ='$user'";
                $result = $localhost2->query($query);
                if ($result->num_rows > 0) {

                  while($row = $result->fetch_assoc()) {

                    $UserRole=$row['UserRole'];

                    $fname=$row['FName'];
                    $lname=$row['LName'];
                    $uid=$row['UserID'];
                    $_SESSION['MM_UserRole']=$UserRole;
                    $sessionID= $_SESSION['MM_UserRole'];


                  }}}
                  if (isset($_GET['FID'])) {
                    $fid =htmlspecialchars(mysqli_escape_string($localhost2,$_GET['FID'])) ; 
                    $_SESSION['mm_FID'] = $fid;
                    $FID=$_SESSION['mm_FID']; 
                  }
                  ?>

                  <!-- page content -->
                  <div class="right_col" role="main">
                    <div class="">
                      <div class="page-title">
                        <div class="title_left">
                          <h3>User Dashboard</h3>
                        </div>


                      </div>
                      <div class="clearfix"></div>

                      <div class="row">
                        <div class="bs-glyphicons" role="tabpanel" data-example-id="togglable-tabs" >


                          <div id="myTab" class="nav nav-tabs bar_tabs wrap animated slideInLeft" role="tablist" >

                            <ul class="bs-glyphicons-list wrap" role="presentation" style="top: 10px; left:20px;">
                             <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <li class="active"><span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
                              <span class="glyphicon-class">Farming</span>
                            </li>
                          </a>
                        </ul>
                        <ul class="bs-glyphicons-list wrap" style="top: 130px; left:20px;" role="presentation" ><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                          <li class=""><span class="glyphicon glyphicon-tasks " aria-hidden="true"></span>
                            <span class="glyphicon-class">Farm Management</span>
                          </li>
                        </a>

                      </ul>

                      <ul class="bs-glyphicons-list wrap" style="top: 250px; left:20px;"  role="presentation"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">
                       <li class=""><span class="glyphicon fa fa-usd" aria-hidden="true"></span>
                        <span class="glyphicon-class">Farm Accounts</span>
                      </li>
                    </a>
                  </ul>

                  <ul class="bs-glyphicons-list wrap"  style="top: 370px; left:20px;" role="presentation"><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">
                   <li class=""><span class="glyphicon fa fa-gears" aria-hidden="true"></span>
                    <span class="glyphicon-class">Set Farm</span>
                  </li>
                </a>
              </ul>

            </div>


            <div id="myTabContent" class="tab-content verticalLine1 form-group" ><div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane animated slideInRight active wrap1" id="tab_content1" aria-labelledby="home-tab">
                <ul class="bs-glyphicons-list" >
                  <?php 
                   $query = "SELECT * FROM farm where UserID ='$uid' AND FarmID='$FID' AND FarmByType LIKE '%Horticulture%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 {
                  echo "<a  href=\"Hotifam.php?FID=$FID\">"; ?> 
                  <li>
                   <span class="glyphicon glyphicon-apple" aria-hidden="true"><i class="fa fa-pagelines"></i></span>
                   <span class="glyphicon-class">Horticulture</span>
                 </li>
                 <?php echo"</a>";}?>
                  <?php 
                   $query = "SELECT * FROM farm where UserID ='$uid' AND FarmID='$FID' AND FarmByType LIKE '%Livestock%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 { echo "<a  href=\"Livestock.php?FID=$FID\">"; ?> 
                 <li>
                  <span class="glyphicon fa fa-paw" aria-hidden="true"></span>
                  <span class="glyphicon-class">Livestock Farming</span>
                </li>
                <?php echo"</a>";}?>
                 <?php 
                   $query = "SELECT * FROM farm where UserID ='$uid' AND FarmID='$FID' AND FarmByType LIKE '%Fish%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 { echo "<a  href=\"Fish.php?FID=$FID\">"; ?> 
                <li>
                  <span class="glyphicon fa fa-anchor" aria-hidden="true"></span>
                  <span class="glyphicon-class">Fish Farming</span>
                </li>
                <?php echo"</a>";}?>
                <div class="clearfix"></div>
                 <?php 
                   $query = "SELECT * FROM farm where UserID ='$uid' AND FarmID='$FID' AND FarmByType LIKE '%Poultry%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 { echo "<a  href=\"Poutry.php?FID=$FID\">"; ?> 
                <li>
                  <span class="glyphicon fa fa-twitter" aria-hidden="true"></span>
                  <span class="glyphicon-class">Poultry Farming</span>
                </li>
                <?php echo"</a>";}?>

                 <?php 
                   $query = "SELECT * FROM farm where UserID ='$uid' AND FarmID='$FID' AND FarmByType LIKE '%Seed%'";
                   $result = $localhost2->query($query);
                if ($result->num_rows > 0)
                 { echo "<a  href=\"Cereals.php?FID=$FID\">"; ?> 
                <li><span class="glyphicon glyphicon-grain" aria-hidden="true"></span>
                  <span class="glyphicon-class">Seed Production</span>
                </li>
                <?php echo"</a>";}?>
                
              </ul>
            </div>

            <div role="tabpanel" class="tab-pane animated slideInRight wrap1" id="tab_content2" aria-labelledby="profile-tab">

              <ul class="bs-glyphicons-list " >
                <?php echo "<a  href=\"Newfwork.php?FID=$FID\">"; ?> 
                <li>
                  <span class="glyphicon fa fa-users" aria-hidden="true"></span>
                  <span class="glyphicon-class">Add New Farm Worker</span>
                </li>
                <?php echo "</a>";  ?> 
                <?php echo "<a  href=\"NewFarm.php?FID=$FID\">"; ?> 
                <li>
                  <span class="glyphicon" aria-hidden="true"><i  class="fa fa-building"></i><i class="fa fa-road"></i></span>
                  <span class="glyphicon-class">Add New Farm Details</span>
                </li>
                <?php echo "</a>";  ?> 
                <?php echo "<a  href=\"Agrochem.php?FID=$FID\">"; ?> 
                <li>
                  <span class="glyphicon" aria-hidden="true"><i  class="fa fa-tint"></i><i  class="fa fa-fire-extinguisher"></i></span>
                  <span class="glyphicon-class">Agro-Chemicals</span>
                </li>
                <?php echo "</a>";  ?> 
                <div class="clearfix"></div>
                <?php echo "<a  href=\"Agrofeed.php?FID=$FID\">"; ?> 
                <li>
                  <span class="glyphicon fa fa-cutlery" aria-hidden="true"></span>
                  <span class="glyphicon-class"> Agro-Supplements</span>
                </li>
                <?php echo "</a>";  ?> 

                <?php echo "<a  href=\"Restock.php?FID=$FID\">"; ?> 
                <li>
                  <span class="glyphicon" aria-hidden="true"><i  class="fa fa-truck"></i><i  class="fa fa-cubes"></i></span>
                  <span class="glyphicon-class">Restock Feeds & Chemicals</span>
                </li>
                <?php echo "</a>";  ?> 

                <?php echo "<a  href=\"contacts.php?FID=$FID\">"; ?> 
                <li>
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  <span class="glyphicon-class">Employee Contacts</span>
                </li>
                <?php echo "</a>";  ?> 
              </ul>


            </div>

            <div role="tabpanel" class="tab-pane animated slideInRight wrap1" id="tab_content3" aria-labelledby="profile-tab2">
             <ul class="bs-glyphicons-list ">
              <?php echo "<a  href=\"Paywork.php?FID=$FID\">"; ?> 
              <li>
                <span class="glyphicon " aria-hidden="true"><i class="fa fa-male"></i><i class="fa fa-money"></i><i class="fa fa-female"></i></span>
                <span class="glyphicon-class">Pay Workers</span>
              </li>
              <?php echo "</a>";  ?> 
              <?php echo "<a  href=\"Accounts.php?FID=$FID\">"; ?> 
              <li>
                <span class="glyphicon fa fa-calculator" aria-hidden="true"></span>
                <span class="glyphicon-class">Farm Inputs/Products Accounting </span>
              </li>
              <?php echo "</a>";  ?> 
              <?php echo "<a  href=\"Cashflow.php?FID=$FID\">"; ?> 
              <li>
               <span class="glyphicon" aria-hidden="true"><i  class="fa fa-dollar"></i><i  class="fa fa-line-chart"></i></span>
               <span class="glyphicon-class">Cash Flow</span>
             </li>
             <?php echo "</a>";  ?> 
           </ul>
         </div>
         <div role="tabpanel" class="tab-pane animated slideInRight wrap1" id="tab_content4" aria-labelledby="profile-tab3">
           <ul class="bs-glyphicons-list " style=" overflow-y: auto;">
            <?php echo "<a  href=\"Farmset.php?FID=$FID\">"; ?> 
            <li>
              <span class="glyphicon fa fa-wrench" aria-hidden="true"></span>
              <span class="glyphicon-class">Crop Setting</span>
            </li>
            <?php echo "</a>";  ?> 
            <?php echo "<a  href=\"Aniset.php?FID=$FID\">"; ?> 
            <li>
              <span class="glyphicon fa fa-tachometer" aria-hidden="true"></span>
              <span class="glyphicon-class">Livestock Setting</span>
            </li>
            <?php echo "</a>";  ?> 
            <?php echo "<a  href=\"Details.php?FID=$FID\">"; ?> 
            <li>
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              <span class="glyphicon-class">Farm Details</span>
            </li>
            
            <?php echo "</a>";  ?> 


          </ul>


        </div>



      </div>
    </div>



    <div class="details">
      <?php
      error_reporting(0);

      $query="SELECT * from farm where FarmID='$FID'";
      $results=mysqli_query($localhost2, $query);
      foreach ($results as $farms)  {
       $faname=$farms['FarmName'];
       $FToken=$farms['Farm_Token'];
       $floc=$farms['FarmLocation'];
       $nworkers=$farms['NoWorkers'];
     }?>
     <input type="hidden" id="FDD" value="<?php echo  $FToken;?>" onload="function($this.id)" />

     <div class="item form-group ">
       <label for="Fname">Farm Name * :</label>
       <label><?php echo $faname;?></label>
     </div>  <div class="clearfix"></div>
     <div class="item form-group ">
      
       <label></label><label for="Lname" style="color: #0aada3;">Your Farm-Token:</label>
       <label style=" font-size: 21px;"><u><?php echo  $FToken;?></u></label>
     </div>
     <div class="clearfix"></div>
     <div class="form-group  ">
       <label for="Mname" style="color: #0aada3;">Location:</label>
       <label><?php echo $floc;?></label>
     </div>
     <div class="clearfix"></div>
     <div class="item form-group  ">
       <label></label><label for="Lname" style="color: #0aada3;">Number of Workers:</label>
       <label><?php echo $nworkers; ?></label>
     </div>

     <div class="clearfix"></div>
     <div class="clearfix"></div>
     <div class="item form-group ">
      <?php echo "<a  href=\"#?uid=$uid\">"; ?> 
      <button type="submit" id="fc_create" data-toggle="modal" data-target="#CalenderModalNew" class="btn btn-success" onclick="">Select Farm Profile</button>
      <?php echo "</a>";  ?> 
    </div>
  </div>


  <div id="CalenderModalNew" class="modal fade"  >
    <div class="modal-dialog" >
      <div class="modal-content" >
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Select a Farm Profile here!</h4>
      </div>

      <div class="modal-body"> 
       <form action="<?php $_SERVER['PHP_SELF'];?>" method="GET" >

        <div class=" form-group col-md-7">
          <div class="item form-group">
            <label for="FarmCategory" style="color: #0aada3;">Change Farms:</label>
            <select id="FarmCategory" class="form-control" name="FID" required>
             <option value="">Select a Farm...</option>
             <?php
             $query="SELECT * from farm where UserID='$uid'";
             $results=mysqli_query($localhost2, $query);
             foreach ($results as $farms)  {
              $FName=$farms['FarmName'];
              $Fid=$farms['Farm_Token'];
              $farmid=$farms['FarmID'];

              ?>

              <option value="<?php echo $farmid;?>" ><?php echo $FName;?></option>


              <?php }?>

            </select>

          </div>
          <div class="form-group">

            <button type="submit" class="btn btn-success" >Select Profile</button>

          </div>
        </div>  
        Current Farm:<div class="form-group " style="border:dashed 1px;color: #e80039;resize: auto;min-height:auto;width: 200px;position: absolute;right:0;padding: 4px;top: 30px;">
       
         <label style="color: #0aada3; font-size: 21px;"><u><?php echo $faname;?></u></label>
       </div>
     </form>

   </div>
 </div>
</div>




<!-- footer content -->

<!-- /footer content -->
<!-- /page content -->
</div> 

</div>
</div>

</div>
<!-- /page content -->
</div>
<!-- footer content -->
<footer>
  <div class="copyright-info">
    <p class="pull-right">©2016 All Rights Reserved <i class="fa fa-tree" style="font-size: 20px;">Farm Management System</i>. Privacy and Terms</p>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<!-- /footer content -->

<div id="custom_notifications" class="custom-notifications dsp_none">
  <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
  </ul>
  <div class="clearfix"></div>
  <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="../Assets/js/bootstrap.min.js"></script>

<!-- bootstrap progress js -->
<script src="../Assets/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="../Assets/js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="../Assets/js/icheck/icheck.min.js"></script>

<script src="../Assets/js/custom.js"></script>

<!-- pace -->
<script src="../Assets/js/pace/pace.min.js"></script>
<script src="../Assets/js/jquery-1.12.2.min.js"></script>

<style type="text/css">
  .wrap {
    width: 90em; 
    position: absolute;
    word-wrap: break-word;


  }
  .wrap1 {
    width: 90em; 

  }
  .verticalLine1 {
    border:solid 1px;
    color: #159ea6;
    position: relative;
    left: 200px;
    top: 10px;
    height:480px;
    word-wrap:break-word;
    padding:15px;
    word-break: keep-all;
    width: 550px; 
  }
  .details{
    border:dashed 1px;
    color: #159ea6;
    position: absolute;
    left: 995px;
    top: 123px;
    height:280px;
    padding: 10px;
    word-break: keep-all;
    width: 300px;
    margin-right: 2px;
  }



</style>

<?php
}
else
  echo '<script>alert("You are not logged in please login to proceed")
var newLocation = "login.php";
window.location = newLocation;</script>';
?>

</body>

</html>