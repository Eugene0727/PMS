<?php  session_start();
 /*     error_reporting(0);*/
      include('includes/dbconnection.php');
      include('includes/function.php'); 
      $id = $_GET['id'];
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>Reservation Slip</title>
   

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

    <!-- <style type="text/css">
        p{
            background-color: white;
        }
    </style> -->

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body class="bgreference">
            
                
              <div id="container">
              <?php if($id == 0){ ?>
                                  <p> <a href="register.php">BACK</a></p>
                                  <?php }else{ ?>
                                   <p> <a href="clientPortal.php?id=<?php echo $id ?>">BACK</a> </p>
                                  <?php } ?> 
            </div>
   
       

     <div class="login-content">
    <div  id="exampl">    
    <div class="login-form2">
    <div class="logo2"><img src="images/arrow.png"></div> 
    <center id="top">
      <div class="logo"><img src="images/car3.png"></div>
      <div class="head"> 
        <p class="header">PLMS Inc.<br>
        Address: Pamantasan ng Cabuyao <br>
        Banay-Banay Katapatan Homes<br>
         Tel#: 0000-0000-000
        </p>
      </div>
        <a>**********************************************</a><br>
        <a class = "h2">PARKING RECEIPT</a><br>
        <a>**********************************************</a>
    
       <div class="card-body">
        <table class="table">
               <?php
                $referenceId = get_customer_lastId()-1;
$ret=mysqli_query($con,"select tblcustomer.*, tblcategory.VehicleCat, tblbrand.brandName from (tblcategory inner join tblcustomer on tblcategory.categoryId = tblcustomer.categoryId) inner join tblbrand on tblbrand.brandId = tblcustomer.brandId where tblcustomer.ReferenceNo ='$referenceId'");
while ($row=mysqli_fetch_array($ret)) {
?>
                <a class = "time"><?php  echo $row['InTime'];?></a>
                <div class ="output">
                <a> RESERVED SLOT:  <?php  echo $row['ParkingSlot'];?></a><br>
                <a> NAME:           <?php  echo $row['OwnerName'];?></a><br>
                <a> VEHICLE TYPE:   <?php  echo $row['VehicleCat'];?></a><br>
                <a> BRAND NAME:     <?php  echo $row['brandName'];?></a><br>
                <a> PLATE NUMBER:   <?php  echo $row['PlateNo'];?></a><br>
                </div>
                <div class = "reference"> REFERENCE NO: <?php  echo $row['ReferenceNo'];?></a><br>
                <?php }?>
</table>
<a>**********************************************</a><br>
  <div class="barcode"><img src="images/Barcode1.png"></div>
   <p class = "note">THANK YOU AND DRIVE SAFELY!</p>


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
              </table>
               </div>

                    </div>
               
            </div>
                </div><br><br>
                <!--  <button><center>PRINT</center></button> -->
            </div>
        </div>
<!--     </div> -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <div ontouchstart="" style="text-align:center;">

      <div class="button">
        <a class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)"> PRINT HERE </a>
      </div>
    </div>
     <p ><center><strong>NOTE:</strong> Please print your reservation slip. This will serve as your proof of reservation upon going to our office. 
      Click the print button above.</center> </p>

       <?php include_once('includes/footer.php');?>

</body>
</html>

