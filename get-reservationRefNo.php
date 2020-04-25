<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>REFERENCE INFORMATION</title>
   

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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body class="bgreference">
    <!--  <div id="right-panel" class="right-panel">
    <header id="header" class="header"> -->

                                <div id="container">
                                 <p><a href="dashboard.php?id=<?php $id = $_SESSION['id']; echo $id?>">DASHBOARD</a> </p>
                                 <p><a href="listOfReservedCustomer.php?id=<?php $id = $_SESSION['id']; echo $id?>">RESERVATION LIST</a></p>
                                </div>
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
        <a>**********************************************</a><br>
        <a class = "h2">REFERENCE INFORMATION</a><br>
        <a>**********************************************</a>
    
                <div class="card-body">
                <table class="table">
               <?php
                session_start();
                error_reporting(0);
                include('includes/dbconnection.php');
                include('includes/function.php');
                $id = $_GET['id'];
                 date_default_timezone_set("Asia/Manila");
                $dateTime = date("y-m-d")." ".date("h:i:s");
$sql = mysqli_query($con,"update tblcustomer set InTime='$dateTime',remarks='None' where ReferenceNo='$id'");
$ret=mysqli_query($con,"select tblcustomer.*, tblcategory.VehicleCat, tblbrand.brandName from (tblcategory inner join tblcustomer on tblcategory.categoryId = tblcustomer.categoryId) inner join tblbrand on tblbrand.brandId = tblcustomer.brandId where tblcustomer.ReferenceNo ='$id'");
while ($row=mysqli_fetch_array($ret)) {
?>
                <div class="time"> <?php  echo $row['InTime'];?></div>
                <div class ="output">
                <a> NAME: <?php  echo $row['OwnerName'];?></a><br>
                <a> VEHICLE TYPE: <?php  echo $row['VehicleCat'];?></a><br>
                <a> BRAND NAME: <?php  echo $row['brandName'];?></a><br>
                <a> PLATE NUMBER: <?php  echo $row['PlateNo'];?></a><br>
                </div>
                <div class = "reference"> REFERENCE NO: <?php echo $row['ReferenceNo'];?></div>
                <?php 
}?>
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
            </div>
                </div><br><br>
                <!--  <button><center>PRINT</center></button> -->
            </div>
        </div>
    </div>

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
      <p><center><strong>NOTE:</strong> Please print your reservation slip. This will serve as your proof of reservation upon going to our office. 
      Click the print button above.</center> </p>

       <?php include_once('includes/footer.php');?>

</body>
</html>

