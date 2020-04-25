<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>BILLING STATUS</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
   

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="assets/css/style.css">

</head>

<style>
.form-control{
  background-color: transparent;
}

</style>

<body id = "body">

            <div id= "container">
                    <p><a href="parkalot/clientPortal.php?id=<?php $id = $_SESSION['id']; echo $id?>">Home</a></p>
                    <p><a href="view-billing.php?id=<?php $id = $_SESSION['id']; echo $id?>">Billing Status</a></p>
                    <p><a>Viewing Billing Status</a></p>
                   
            </div>
           

      <div class="content">
            <div class="animated fadeIn">
              <!--   <div class="row"> -->

        <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                   <!--  <a href="index.php">
                        <h2 style="color: #fff">Vehicle Parking Management System</h2>
                    </a> -->
                </div>

                <div class="login-form1">
                    <form method="post">
                        <input type="hidden" name="_token" value="cgyIluSERsGxnNMMVRf2rv3xz2rqQbsrTPoVwW6d">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>BILLING LOG</h3>
            <div id="error">
                                            </div><br><br>
                        <div class="form-group">
                            <label>Enter your reference number</label>
                           <input class="form-control" type="text" placeholder="Reference number" required="true" name="customerReference">
                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Submit Reference</button>
                         <p>This serves as a unique identifier assigned to our customer and designated for a single transaction. </p>
                  
                    </form>
                     </div>
                </div>
            </div>
        </div>

                                 <?php
if(isset($_POST['login']))
{ 
 $id=$_GET['id'];
    date_default_timezone_set("Asia/Manila");
    $dateTime = date("y-m-d")." ".date("h:i:s");
    $reference=$_POST['customerReference'];
    $query=mysqli_query($con,"select ReferenceNo,ParkingSlot,OwnerName,PlateNo,InTime from tblvehicle where  ReferenceNo='$reference' AND areaId='$id'");
        
$cnt=1;
$ctr = 0;
while ($row=mysqli_fetch_array($query)) {
    if($row['ReferenceNo'] == $reference){
        $ctr++;
?>
         <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>Parking Slot</th>
                    <th>Name</th>
                    <th>Plate Number</th>
                    <th>Time In</th>
                    <th>Current No. Of Hour/s</th>
                    <th>Current Bill</th>
                </tr>
                                        </tr>
                                        </thead>
         <tr>
                  <td><?php  echo $row['ParkingSlot'];?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['PlateNo'];?></td>
                  <td><?php  echo $row['InTime'];?></td>
                  <td><?php $start = strtotime($row['InTime']); $end = strtotime($dateTime); $difference = abs($end - $start)/3600; echo round($difference);?></td>
                  <td><?php $start = strtotime($row['InTime']); $end = strtotime($dateTime); $difference = abs($end - $start)/3600; echo round($difference * 15);?></td>
                </tr> 
<?php                   
    }
}
if($ctr == 0){
?>
     <tr><br><td><br></td><td>No record found. Please check your reference number in the reference slip.</td></tr>
<?php
}
}?>
              </table>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>


<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>