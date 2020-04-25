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

  <?php include_once('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

     <?php include_once('includes/header.php');?>
      <script src="jquery-3.4.1.min.js"></script>
   <script>
     function verifyRemark(id,remark){
        let referenceNo = id;
        if(remark == 'None'){
             window.location.href ="view-incomingvehicle-detail.php?viewid="+referenceNo;
        }
        else if(remark == 'Out'){
             window.location.href ="view-outgoingvehicle-detail.php?viewid="+referenceNo;
        }
     }
</script>

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
                                    <li><a href="bwdates-report-ds.php?id=admin">Between Date Reports</a></li>
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
                 <?php include("chartReportsAdmin.php")?>
                </div>
                <canvas id="chartReportsAdmin" width="296" height="147" class="chartjs-render-monitor" style="display: block; height: 197px; width: 395px;"></canvas>
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
                   <?php include('adminIncomePerYear.php');?>
                </div>
                <canvas id="adminIncomePerYear" width="296" height="147" class="chartjs-render-monitor" style="display: block; height: 197px; width: 395px;"></canvas>
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
                        <h3 class="font-weight-light mb-xl-4">Customer</h3>
                        <?php $sqlF = mysqli_query($con,"select ReferenceNo from tblcustomer where date(InTime) between '$fdate' and '$tdate' AND sexId='1'");
                              $female=mysqli_num_rows($sqlF);
                              $sqlM = mysqli_query($con,"select ReferenceNo from tblcustomer where date(InTime) between '$fdate' and '$tdate' AND sexId='2'");
                              $male=mysqli_num_rows($sqlM); ?>
                        <p class="text-muted mb-2 mb-xl-0">The total number of parking within the date range. In which <b><?php echo $female?> <?php if($female > 1){ ?>are<?php }else{ ?>is<?php }?> female</b> and <b><?php echo $male ?> <?php if($male > 1){ ?>are<?php }else{ ?>is<?php }?> male.</b></p>
                      </div>  
                    </div>
                    <div class="col-md-12 col-xl-9">
                      <div class="row">
                        <div class="col-md-6 mt-3 col-xl-5">
                <div class="card-body">
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"><ul class="1-legend"><span style="background-color:#8EB0FF"></div>
                  <center><p class="card-title"></p></center>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                   <?php include('chartDoughnutIncome.php');?>
                </div>
                <canvas id="doughnutIncome" width="296" height="147" class="chartjs-render-monitor" style="display: block; height: 197px; width: 395px;"></canvas>
                <div class="card border-right-0 border-left-0 border-bottom-0">
              </div>
                        </div>
                        <div class="col-md-6 col-xl-7">
                          <div class="table-responsive mb-3 mb-md-0">
                            <table class="table table-borderless report-table">
                              <tbody>
                                <tr>
                                <td class="text-muted"></td>
                                <td class="w-100 px-0">
                                </td>
                                <td><h5 class="font-weight-bold mb-0"></h5></td>
                              </tr>
                               <center><h5 class="font-weight-bold mb-0">Income For: </h5></center>
                               <tr>
                                <td class="text-muted"></td>
                                <td class="w-100 px-0">
                                </td>
                                <td><h5 class="font-weight-bold mb-0"></h5></td>
                              </tr>
                              <tr>
                                <tr>
                                <td class="text-muted">In Vehicle</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <?php $in = $_SESSION['inVeh']; $out = $_SESSION['outVeh'];
                                        if($in == 0){ ?>
                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        <?php }else{ 
                                              if($in > $out){ ?>
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  <?php }else{ ?>
                                         <div class="progress-bar bg-primary" role="progressbar" style="width: 35%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  <?php }}?>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo  $_SESSION['inVeh']; ?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Already Out Vehicle</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <?php $in = $_SESSION['inVeh']; $out = $_SESSION['outVeh'];
                                     if($out == 0){ ?>
                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        <?php }else{ 
                                          if($in < $out){ ?>
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                     <?php }else{ ?>
                                         <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  <?php }} ?>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo  $_SESSION['outVeh']; ?></h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">All Vehicle</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0"><?php echo  $_SESSION['allVeh']; ?></h5></td>
                              </tr>
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
                            <?php
$fdate=$_SESSION['adminfromdate'];
$tdate=$_SESSION['admintodate'];

?>
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
                          <div class="scrollable">
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                    <th>Owner Name</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Bill</th>

                   
                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select *from  tblcustomer where date(InTime) between '$fdate' and '$tdate' AND remarks != 'Reserved'");
$cnt=1;
$outBill = 0;
$inBill = 0;
$allBill = 0;
date_default_timezone_set("Asia/Manila");
$dateTime = date("y-m-d")." ".date("h:i:s");
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['InTime'];?></td>
                   <?php if($row['remarks'] == 'None'){ ?>
                    <td>NOT YET</td>
                     <td><?php $start = strtotime($row['InTime']); $end = strtotime($dateTime); $difference = abs($end - $start)/3600; echo "₱ ".round($difference * 15).".00";?></td>
                    <?php }else{ ?>
                    <td><?php  echo $row['OutTime'];?></td>
                   <td><?php  echo "₱ ".$row['Bill'];?></td>
                   <?php } ?>
                  
                  <td><button onclick='verifyRemark("<?php echo $row['ReferenceNo']?>","<?php echo $row['remarks']?>")'>View</button></td>
                </tr>
                <?php 
$cnt=$cnt+1;
if($row['remarks'] == 'None' || $row['remarks'] == 'Out'){
    if($row['remarks'] == 'Out'){
         $start = strtotime($row['InTime']); 
        $end = strtotime($row['OutTime']); 
        $difference = abs($end - $start)/3600; 
        $allBill = $allBill + round($difference * 15);
    }else{
         $start = strtotime($row['InTime']); 
    $end = strtotime($dateTime); 
    $difference = abs($end - $start)/3600; 
    $allBill = $allBill + round($difference * 15);
    $inBill = $inBill + round($difference * 15);
    }
}
if($row['remarks'] == 'Out'){
    $start = strtotime($row['InTime']); 
    $end = strtotime($row['OutTime']); 
    $difference = abs($end - $start)/3600; 
    $outBill = $outBill + round($difference * 15);
}
/*if($row['remarks'] == 'None'){
    $start = strtotime($row['InTime']); 
    $end = strtotime($dateTime); 
    $difference = abs($end - $start)/3600; 
    $inBill = $inBill + round($difference * 15);
}*/
} $_SESSION['cnt'] = $cnt; $_SESSION['inVeh'] = $inBill; $_SESSION['outVeh'] = $outBill; $_SESSION['allVeh'] = $allBill;?>
           <!--  <tr>
                <td>Bill Including Not Yet Out Vehicle: <strong><?php echo $allBill; ?></strong></td>
                <td>Total Bill: <strong><?php echo $totalBill; ?></strong></td>
            </tr> -->
              </table>
            </div>
              <br>
                <center><pre>Total Bill of In Vehicle: <strong><?php echo "₱ ".$inBill.".00"; ?></strong>        Total Bill of Out Vehicle: <strong><?php echo "₱ ".$outBill.".00"; ?></strong>          Total of All Bill: <strong><?php echo "₱ ".$allBill.".00"; ?></strong>      </pre></center>

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