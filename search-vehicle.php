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
   
    <title>Search Vehicle</title>
   

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
     function viewCustomer(id){
        let referenceNo = id;
        window.location.href ="view-incomingvehicle-detail.php?viewid="+referenceNo;
     }
      function printReceipt(id){
        let referenceNo = id;
        window.location.href ="print.php?viewid="+referenceNo;
     }
      function addToBlacklist(id){
        let referenceNo = id;
        window.location.href ="add-blacklist.php?id="+referenceNo;
     }

     function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
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
                                    <li><a href="search-vehicle.php?id=<?php $id = $_SESSION['id']; echo $id?>">Search Vehicle</a></li>
                                    <li class="active">Search Vehicle</li>
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
                            <strong class="card-title">Search Vehicle</strong>
                        </div>
                        <div class="card-body">
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="search">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Search By Plate Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="searchdata" name="searchdata" class="form-control"  required="required" autofocus="autofocus" ></div>
                                    </div>
                                 
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="search" >Search</button></p>
                                </form>
                                 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>NO</th>
            
                 
                    <th>Parking Number</th>
                    <th>Owner Name</th>
                    <th>Plate Number</th>
                   
                          <th><center>Action</center></th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
               $id = $_GET['id'];
$ret=mysqli_query($con,"select * from  tblcustomer where PlateNo like '$sdata%' AND remarks='None'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['ParkingSlot'];?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['PlateNo'];?></td>
                  
                  <td><button onclick="viewCustomer('<?php $referenceNo = $row["ReferenceNo"]; echo $referenceNo ?>')">View Bill Status</button> | <button onclick="printReceipt('<?php $referenceNo = $row["ReferenceNo"]; echo $referenceNo ?>')">Print Receipt</button> | <button onclick="addToBlacklist('<?php $referenceNo = $row["ReferenceNo"]; echo $referenceNo ?>')">Add to Blacklist</button></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
     <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
              </table>
              
                    </div>
                </div>
            </div>

                                 <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">List of Customer</strong>
                        </div>
                        <div class="card-body">
                          <div class="scrollable">
                           <!--  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
<table class="table" id="myTable">
                <thead>
                                        <tr>
                                            <tr>
                  <th>No.</th>
                     <th>Owner Name</th>
                      <th>Contact Number</th>
                    <th>Parking Slot</th>
                      <th>Vehicle Type</th>
                      <th>Plate Number</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"Select tblcustomer.*, tblcategory.VehicleCat from tblcategory inner join tblcustomer on tblcategory.categoryId = tblcustomer.categoryId where tblcustomer.areaId ='$id'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                   <td><?php  echo $row['OwnerName'];?></td>
                    <td><?php  echo $row['OwnerContactNumber'];?></td>
                     <td><?php  echo $row['ParkingSlot'];?></td>
                  <td><?php  echo $row['VehicleCat'];?></td>
                  <td><?php  echo $row['PlateNo'];?></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
              </table>
            </div>

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