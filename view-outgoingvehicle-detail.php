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
   
     <title>BILLING REPORT</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->

  <?php include_once('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

     <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php?id=<?php $id = $_SESSION['id']; echo $id?>">Dashboard</a></li>
                                    <li><a href="search-vehicle.php?id=<?php $id = $_SESSION['id']; echo $id?>">Search Vehicle</a></li>
                                    <li class="active"><a href="bwdates-report-ds.php?id=<?php $id = $_SESSION['id']; echo $id?>">Reports</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                   
         

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Billing Report</strong>
                        </div>
                                 <div class="col-lg-12">
                    <div class="card">
                        <?php
 $id=$_GET['viewid'];
 $areaId = $_SESSION['id'];
    date_default_timezone_set("Asia/Manila");
    $dateTime = date("y-m-d")." ".date("h:i:s");
    $reference=$_POST['customerReference'];
    $query=mysqli_query($con,"select * from tblcustomer where  ReferenceNo='$id' AND areaId='$areaId'");
        
$cnt=1;
$ctr = 0;
while ($row=mysqli_fetch_array($query)) {
    if($row['ReferenceNo'] == $id){
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
                    <th>Time Out</th>
                    <th>Total No. Of Hour/s</th>
                    <th>Total Bill</th>
                </tr>
                                        </tr>
                                        </thead>
         <tr>
                  <td><?php  echo $row['ParkingSlot'];?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['PlateNo'];?></td>
                  <td><?php  echo $row['InTime'];?></td>
                  <td><?php  echo $row['OutTime'];?></td>
                  <td><center><?php $start = strtotime($row['InTime']); $end = strtotime($row['OutTime']); $difference = abs($end - $start)/3600; echo round($difference);?></center></td>
                  <td><?php echo "₱ ".$row['Bill']; ?></td>
                </tr> 
<?php                   
    }
}
if($ctr == 0){
?>
     <tr><br><td><br></td><td>No record found. Please check your reference number in the reference slip.</td></tr>
<?php
}?>
              </table>

                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<?php include_once('includes/footer.php');?>

</div><!-- /#right-panel -->

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