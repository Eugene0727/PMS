  <?php
session_start();
/*error_reporting(0);*/
include('includes/dbconnection.php');
include('includes/function.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{


?>          
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!DOCTYPE html>
<html>
<style >
    




</style>
<body class="bgreference">
   
                               <div id="container">
                                    <p><a href="dashboard.php?id=<?php $id = $_SESSION['id']; echo $id?>">DASHBOARD</a></p>
                                    <p><a href="search-vehicle.php?id=<?php $id = $_SESSION['id']; echo $id?>">SEARCH VEHICLE</a></p>
                                    <p><a class="active">RECEIPT INFORMATION</a></p>
                              </div>

   <div class="login-content">
    <div  id="exampl">    
    <div class="login-form2">
    <div class="logo2"><img src="images/arrow.png"></div> 
    <center id="top">
      <div class="logo"><img src="images/car1.png"></div>
      <div class="head"> 
        <p class="header">PLMS Inc.<br>
        Address: Pamantasan ng Cabuyao <br>
        Banay-Banay Katapatan Homes<br>
         Tel#: 0000-0000-000
        </p>
      </div>
        <a>**************************************************************</a><br>
        <a class = "h2">CUSTOMER BILLING</a><br>
        <a>**************************************************************</a>
    
                <div class="card-body">
                <table class="table">
                             
<?php
 $cid=$_GET['viewid'];
 $id = $_SESSION['id'];
 date_default_timezone_set("Asia/Manila");
  $date = date("Y-m-d");
  $dateTime = date("y-m-d")." ".date("h:i:s");

 $sql = mysqli_query($con,"update tblcustomer set OutTime ='$dateTime' where ReferenceNo='$cid'");
$ret=mysqli_query($con,"select tblcustomer.*, tblcategory.VehicleCat, tblbrand.brandName from (tblcategory inner join tblcustomer on tblcategory.categoryId = tblcustomer.categoryId) inner join tblbrand on tblbrand.brandId = tblcustomer.brandId where tblcustomer.ReferenceNo ='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
      $slot = $row['ParkingSlot'];
      $ql2 = mysqli_query($con,"update tblparkingslot set status='Available' where slotName='$slot' AND areaId='$id'");
  ?>
<div  id="exampl">

   <!-- <div class="sufee-login d-flex align-content-center flex-wrap"> -->
        <!-- <div class="container">
            <div class="login-content">
    <div class="login-form"> -->
      <!-- <table border="1" class="table table-bordered mg-b-0"> -->
       <!--  <tr>
          <th colspan="4" style="text-align: center; font-size:22px;"> Vehicle Parking receipt</th>

        </tr>
   
   <tr> -->
                  <div class ="output2">
                                <a>PARKING SLOT:</a>
                                   <a><?php  echo $row['ParkingSlot'];?></a><br>

                                <a>VEHICLE CATEGORY:</a>
                                   <a><?php  echo $row['VehicleCat'];?></a><br>
                                  
                                <a>VEHICLE COMPANY NAME:</a>
                                   <a><?php  echo $packprice= $row['brandName'];?></a><br>
                             
                                <a>REGISTRATION NUMBER:</a>
                                   <a><?php  echo $row['PlateNo'];?></a><br>
                                  
                                <a>OWNER NAME:</a>
                                    <a><?php  echo $row['OwnerName'];?></a><br>
                                  
                                <a>OWNER CONTACT NUMBER:</a>
                                    <a><?php  echo $row['OwnerContactNumber'];?></a><br>
                                
                                <a>IN TIME:</a>
                                    <a><?php  echo $row['InTime'];?></a><br>

                                <a>OUT TIME:</a>
                                    <a><?php  echo $row['OutTime'];?></a><br>

                                <a>REMARK:</a>
                                  <a><?php  echo $row['remarks'];?></a><br>

                        </div>
                                <div class="charge"><?php $start = strtotime($row['InTime']); $end = strtotime($row['OutTime']); $difference = abs($end - $start)/3600; $profit = "Charge: ₱ ".round($difference * 15).".00"; echo $profit; 
    $bill = mysqli_query($con,"update tblcustomer set Bill = round($difference * 15) where ReferenceNo='$cid'");?></div>

</table>
<a>**************************************************************</a><br>
  <div class="barcode"><img src="images/Barcode1.png"></div>
   <p class = "note">THANK YOU AND DRIVE SAFELY!</p>

<?php }} 
      $ctr = 0; 
      $profitId = get_profit_lastId();
          $profit = mysqli_query($con,"select profitDate from tblprofit where profitDate='$date'");
          while($profitResult = mysqli_fetch_array($profit)){
              $ctr++;
          }
          if($ctr == 0){
            $profit3 = mysqli_query($con,"insert into tblprofit values('$profitId','$date',round($difference * 15),'$id')");
              if(!$profit3){
                 echo "<script>alert('Something went wrong.');</script>";
              } 
          }
          else{
             $profit2 = mysqli_query($con,"update tblprofit set Income=(Income + round($difference * 15)) where profitDate='$date'");
              /* if(!$profit2){
                 echo "<script>alert('Something went wrong.');</script>";
              }*/
          }
          $remark = mysqli_query($con,"update tblcustomer set remarks='Out' where ReferenceNo='$cid'");
         /* if($profitResult['profitDate'] == $date){
                $profit2 = mysqli_query($con,"update tblprofit set Income=(Income + round($difference * 15)) where profitDate='$date'");
               if(!$profit2){
                 echo "<script>alert('Something went wrong.');</script>";
              }
            }
            else{
              $profit3 = mysqli_query($con,"insert into tblprofit values('$profitId','$date',round($difference * 15)");
              if(!$profit3){
                 echo "<script>alert('Something went wrong.');</script>";
              } 
            }*/
?>
          </div>
        </div>
         </div>
        </div>
         </div>
            <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script> 

<div ontouchstart="" style="text-align:center;">
      <div class="button">
        <a class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)"> PRINT HERE </a>
      </div>
    </div>
      <p><center><strong>NOTE:</strong> Please print your reservation slip. This will serve as your proof of reservation upon going to our office. 
      Click the print button above.</center> </p>

       <?php include_once('includes/footer.php');?>
</body>
</html>