<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

$fdate=$_SESSION['superadminfromdate'];
$tdate=$_SESSION['superadmintodate'];
  ?>
<!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>Certain Date - Profit Report</title>
   

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
    <link rel="stylesheet" href="assets/css/scrollbar.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->

  <?php include_once('includes/superAdminSidebar.php');?>

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
                                    <li><a href="superAdminDashboard.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Dashboard</a></li>
                                    <li><a href="superAdminReports.php?id=superadmin">Between Date Reports</a></li>
                                    <li class="active">Between Date Reports</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
    <div class="row">
            <div class="col-md-6 col-xl-6">
              <div class="card">
                <div class="card-body">
                     <center><p class="text-muted font-weight-light">Income Statistic</p><center>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"><ul class="1-legend"><span style="background-color:#8EB0FF"></div>
                  <center><p class="card-title"></p></center>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                 <?php include("chartReports.php")?>
                </div>
                <canvas id="chartReports" width="296" height="147" class="chartjs-render-monitor" style="display: block; height: 197px; width: 395px;"></canvas>
                <div class="card border-right-0 border-left-0 border-bottom-0">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-6">
              <div class="card">
                <div class="card-body">
                     <center><p class="text-muted font-weight-light">Income Details Per Year</p><center>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"><ul class="1-legend"><span style="background-color:#8EB0FF"></div>
                  <center><p class="card-title"></p></center>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                   <?php include('superAdminIncomePerYear.php');?>
                </div>
                <canvas id="superAdminIncomePerYear" width="296" height="147" class="chartjs-render-monitor" style="display: block; height: 197px; width: 395px;"></canvas>
                <div class="card border-right-0 border-left-0 border-bottom-0">
                </div>
              </div>
            </div>
    </div>
</div>
        <div class="clearfix"></div>
        <div class="content">
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Detailed Reports</p>
                  <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                      <div class="ml-xl-4">
                        <h1><?php echo $_SESSION['cnt']-1; ?></h1>
                        <h3 class="font-weight-light mb-xl-4">Sales</h3>
                        <p class="text-muted mb-2 mb-xl-0">The total number of acquired partnership within the date range. It is the period time a user starts it's business activity that engaged with our website.</p>
                      </div>  
                    </div>
                    <div class="col-md-12 col-xl-9">
                      <div class="row">
                        <div class="col-md-6 mt-3 col-xl-5">
                          <center><h5 class="font-weight-bold mb-0">Partner's Location Included in Date Range</h5></center>
                <div class="card-body">
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"><ul class="1-legend"><span style="background-color:#8EB0FF"></div>
                  <!-- <center><p class="card-title"></p></center> -->
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                   <?php include('chartDoughnutLocation.php');?>
                </div>
                <canvas id="chartDoughnutLocation" width="296" height="147" class="chartjs-render-monitor" style="display: block; height: 197px; width: 395px;"></canvas>
                <div class="card border-right-0 border-left-0 border-bottom-0">
              </div>
                        </div>
                        <div class="col-md-6 col-xl-7">
                          <div class="table-responsive mb-3 mb-md-0">
                            <table class="table table-borderless report-table">
                              <tbody>
                               <center><h5 class="font-weight-bold mb-0">Income For Date: </h5></center>
                               <tr>
                                <td class="text-muted"></td>
                                <td class="w-100 px-0">
                                </td>
                                <td><h5 class="font-weight-bold mb-0"></h5></td>
                              </tr>
                              <tr>
                                <?php 
                                      $isIncome=mysqli_query($con,"select * from tbladminprofit where date(profitDate) between '$fdate' and '$tdate' order by profitDate");
                                 /* echo"<script>alert('$oldIncome')</script>";*/
                                  while($isResult=mysqli_fetch_array($isIncome)){
                                ?>
                                <tr>
                                 <!--  <td><p class="text-muted mb-2 mb-xl-0"><?php echo  $isResult['profitDate']; ?></p></td> -->
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-5">
                                         <div class="progress-bar bg-primary" role="progressbar" style="width:<?php echo($isResult['Income']-($isResult['Income']/2))/1000?>%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 style="font-size: 12px"><b><?php echo  $isResult['Income']; ?></b>-<?php $futureDate=date('M-d', strtotime($isResult['profitDate'])); echo $futureDate; ?></h5></td>
                              </tr>
                            <?php } ?>
                            </tbody></table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="clearfix"></div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                   
         

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Between Date Reports</strong>
                        </div>
                        <div class="card-body">
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
                            <div class="scrollable">
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>No.</th>
            
                    <th>Date</th>
                    <th>Profit</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select * from tbladminprofit where date(profitDate) between '$fdate' and '$tdate' order by profitDate");
$cnt=1;
$allBill = 0;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['profitDate'];?></td>
                  <td><?php  echo "₱ ".$row['Income'].".00";?></td>
                </tr>
                <?php 
$cnt=$cnt+1;
$allBill = $allBill + $row['profitDate'];
} $_SESSION['cnt'] = $cnt?>
              </table>
            </div>
              <br>
                <center><pre>Total Profit Between Dates: <strong><?php echo "₱ ".$allBill.".00"; ?></strong></center>
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
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="Chart.min.js"></script>
<script type="text/javascript" src="canvasjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>