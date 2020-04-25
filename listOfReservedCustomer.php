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
   
    <title>List of Reservation</title>
   

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
      function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
function addCustomer(id){
    let custId = id;
    window.location.href ="get-reservationRefNo.php?id="+custId;
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
                                    <li><a href="listOfReservedCustomer.php?id=<?php $id = $_SESSION['id']; echo $id?>">List of Customer In Reservation</a></li>
                                    <li class="active">RESERVATION LIST</li>
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
                            <strong class="card-title">Manage Reserved Vehicle</strong>
                             <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Slot Name" title="Type in a name">

                        </div>
                        <div class="card-body">
                              <div class="scrollable">
                              <table class="table" id="myTable">

                <thead>
                                        <tr>
                                            <tr>
                  <th>Reservation No.</th>
                   <th>Chosen Parking Slot</th>
                    <th>Owner Name</th>
                    <th>Contact No</th>
                   <th>Plate No</th>
                   <th>Vehicle Category</th>
                   <th>Vehicle Brand</th>
                   <th>Time of Reservation</th>
                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
               $id = $_GET['id'];
$ret=mysqli_query($con,"select tblcustomer.*, tblcategory.VehicleCat, tblbrand.brandName from (tblcategory inner join tblcustomer on tblcategory.categoryId = tblcustomer.categoryId) inner join tblbrand on tblbrand.brandId = tblcustomer.brandId where tblcustomer.areaId ='$id' AND tblcustomer.remarks='Reserved'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['ParkingSlot'];?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['OwnerContactNumber'];?></td>
                  <td><?php  echo $row['PlateNo'];?></td>
                  <td><?php  echo $row['VehicleCat'];?></td>
                  <td><?php  echo $row['brandName'];?></td>
                  <td><?php  echo $row['InTime'];?></td>
                  <td><button class = "getSlotId" onclick='addCustomer("<?php echo $row['ReferenceNo'];?>")'>Add Customer</button>|<button class = "getSlotId" >Send Mail Reminder</button></td>
                   <!--  <td><a href="edit-parkingSlot.php?editid=<?php echo $row['slotId'];?>">Edit Details</a></td> -->
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