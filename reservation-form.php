<?php
session_start();
/*error_reporting(0);*/
include('includes/dbconnection.php');
include('includes/function.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{
$id = $_GET['id'];
$cat = $_COOKIE['selectedCat'];
$company = $_COOKIE['selectedCompany'];
if(isset($_POST['submit']))
{
    global $con;
    date_default_timezone_set("Asia/Manila");
    $dateTime = date("y-m-d")." ".date("h:i:s");
    $reference= get_customer_lastId();
    $brandId = get_brand_lastId();
    $notifId = get_notif_lastId();
    $slotNo = $_POST['slotNumber'];
    $catename=$_POST['catename'];
    $vehbrand=$_POST['vehicleBrand'];
    $plateNo=$_POST['plateNumber'];
    $ownername=$_POST['ownername'];
    $ownercontno=$_POST['ownercontno'];
    $companyName = $_POST['companyName'];

     $verifyBrand = mysqli_query($con,"select brandId from tblbrand where brandName='$vehbrand'");
    while($verifyResult = mysqli_fetch_array($verifyBrand)){
        $ctr++;
    }
    if($ctr == 0){
      $isNotExist = mysqli_query($con,"insert into tblbrand values('$brandId','$vehbrand')");
        if(!$isNotExist){
            echo "<script>alert('Something went wrong.');</script>";
        } 
    }
    $sql = mysqli_query($con, "select categoryId from tblcategory where categoryId='$catename'");
    $sqlResult = mysqli_fetch_array($sql);
    $catId = $sqlResult['categoryId'];

    $sql2 = mysqli_query($con, "select brandId from tblbrand where brandName='$vehbrand'");
    $sql2Result = mysqli_fetch_array($sql2);
    $vehBrandId = $sql2Result['brandId'];

    $sql3 = mysqli_query($con, "select customerName from tblblacklist where customerName='$ownername'");
    $result3 = mysqli_fetch_array($sql3);
    $sql4 = mysqli_query($con, "select customerPlateNo from tblblacklist where customerPlateNo='$plateNo'");
    $result4 = mysqli_fetch_array($sql4);


    if($result3['customerName'] != $ownername && $result4['customerPlateNo'] != $plateNo){
           if($id == 0){
       $query = mysqli_query($con, "insert into  tblcustomer values('$reference','$slotNo','$catename','$vehBrandId','$plateNo','$ownername','$ownercontno','$dateTime',NULL,'Reserved',NULL,'$companyName')");  
      }
      else{
        $query = mysqli_query($con, "insert into  tblcustomer values('$reference','$slotNo','$catename','$vehBrandId','$plateNo','$ownername','$ownercontno','$dateTime',NULL,'Reserved',NULL,'$id')");
      }
      if ($query){
            echo "<script>alert('Vehicle Entry Detail has been added');</script>";
            $message = $ownername." reserved a parking slot.";
            $query2 = mysqli_query($con, "update tblparkingslot set status='Reserved' where slotName='$slotNo'");
            $query3 = mysqli_query($con, "insert into tblnotification values('$notifId','$message','$dateTime','unread','$companyName')");
            $_SESSION['counter'] = 0;
            echo "<script>window.location.href ='reservation-slip.php?id=$id'</script>";
      }
      else
      {
         echo "<script>alert('Something Went Wrong. Please try again.');</script>";        
      }
    }
    else{
        echo"<script>alert('Cannot process request since you are in the blacklist');</script>";
  }
}
echo("<script>document.cookie = escape('selectedCat') + '=' + escape(' ') + '; path=/';</script>");
echo("<script>document.cookie = escape('selectedCompany') + '=' + escape(' ') + '; path=/';</script>");
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>RESERVATION FORM</title>
   

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
<body>
   <script src="jquery-3.4.1.min.js"></script>
   <script>
     $(document).ready(function(){
            $("#catename").change(function(){
               let id = '<?php echo $id ?>';
              let selectVal = $(this).val();
              document.cookie = escape('selectedCat') + "=" + escape(selectVal) + "; path=/";

             $('#companyName > option').each(function() {
              let company = "<?php echo $company?>";
                if($(this).val() == company){
                    document.cookie = escape('selectedCompany') + "=" + escape($(this).val()) + "; path=/";
                }
      });
              window.location.href ='reservation-form.php?id='+ id;
      });
            $("#companyName").change(function(){
              let id = '<?php echo $id ?>';
              let selectCompany = $(this).val();
              document.cookie = escape('selectedCompany') + "=" + escape(selectCompany) + "; path=/";
              /*window.location.reload(true);*/
              window.location.href ='reservation-form.php?id='+ id;
            });
        });
</script>
        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="page-title">
                                <ol class="breadcrumb text-right">
                                  <?php if($id == 0){ ?>
                                    <strong><li><a href="register.php">BACK</a></li></strong>
                                  <?php }else{ ?>
                                    <strong><li><a href="parkalot/clientPortal.php?id=<?php echo $id ?>">BACK</a></li></strong>
                                  <?php } ?>
                                </ol>
                            </div>
                                <center><strong>RESERVE</strong> PARKING SLOT</center>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <!-- <?php if($msg){
    echo $msg;
  }  ?>  --></p>
                                   <?php if($id == 0){ ?>
                                             <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Company to where gonna add reservation</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="companyName" id="companyName" class="form-control">
                                                 <?php if($company == " "){ ?> 
                                                <option value="0" selected>Select Company</option> <?php } ?>
                                                <?php $query=mysqli_query($con,"select * from tblbusinesspartner");
              while($sql=mysqli_fetch_array($query))
              {
              ?>                                 <?php if($sql['areaId'] == $company){ ?>
                                                 <option value="<?php echo $sql['areaId'];?>" selected><?php echo $sql['businessName'];?> - <?php echo $sql['companyName'];?></option>
                                                 <?php }else{ ?>
                                                   <option value="<?php echo $sql['areaId'];?>"><?php echo $sql['businessName'];?> - <?php echo $sql['companyName'];?></option>
                                                  <?php } ?>
                  <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                   <?php } ?>
                                      <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Vehicle Category</label></div>
                                        <div class="col-12 col-md-9">
                                           <select name="catename" id="catename" class="form-control" selected='<?php echo $cat?>'>
                                             <?php if($cat == " "){ ?>
                                                <option value="0" selected>Select Category</option> <?php } ?>
                                                <?php if($id == 0){
                                                  $query=mysqli_query($con,"select * from tblcategory where areaId='$company'");
                                                  }
                                                  else{
                                                    $query=mysqli_query($con,"select * from tblcategory where areaId='$id'");
                                                  }
              while($row=mysqli_fetch_array($query))
              {
               /* $catId = $row['categoryId'];
                if($id == 0){
                  $isVerify = mysqli_query($con,"select slotId from tblparkingslot where categoryId='$catId' AND status='Available' AND areaId='$company'");
                  $num=mysqli_num_rows($isVerify);
                }
                else{
                   $isVerify = mysqli_query($con,"select slotId from tblparkingslot where categoryId='$catId' AND status='Available' AND areaId='$id'");
                  $num=mysqli_num_rows($isVerify);
                }

                if($num == 0){
                  echo"<script>alert('This company has no Available Slot choose another company. Thank you.');</script>";
                  echo"<script>window.location.href ='reservation-form.php?id='+ id;</script>";
                  break;
                }
                else{*/
              ?>                  <?php if($row['categoryId'] == $cat){ ?>
                                 <option value="<?php echo $row['categoryId'];?>" selected><?php echo $row['VehicleCat'];?></option> <?php }else{ ?>
                                                 <option value="<?php echo $row['categoryId'];?>"><?php echo $row['VehicleCat'];?></option><?php } ?>
                  <?php }?> 
                                            </select> 
                                        </div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Parking Slot</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="slotNumber" id="slotNumber" class="form-control">
                                                <option value="0">Select Slot Number</option>
                                                <?php if($id == 0){ 
                                                  $query=mysqli_query($con,"select * from tblparkingslot where areaId='$company' AND status='Available' AND categoryId='$cat'"); 
                                                }else{
                                                  $query=mysqli_query($con,"select * from tblparkingslot where areaId ='$id' AND status='Available' AND categoryId='$cat'");
                                                }
              while($slots=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $slots['slotName'];?>"><?php echo $slots['slotName'];?></option>
                  <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle Brand</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="vehicleBrand" name="vehicleBrand" class="form-control" placeholder="Vehicle Brand" required="true"></div>
                                    </div>
                                 
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Plate Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="plateNumber" name="plateNumber" class="form-control" placeholder="Plate Number" required="true" minlength='7' maxlength="7"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownername" name="ownername" class="form-control" placeholder="Owner Name" required="true"></div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Contact Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownercontno" name="ownercontno" class="form-control" placeholder="Owner Contact Number" required="true" maxlength="10" pattern="[0-9]+"></div>
                                    </div>
                                   
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Add</button></p>
                                   <p><strong><center>Please be informed that upon clicking the add button there is no cancellation of reservation. Once, you didn't go to our office on the day or a day after your reservation. Automatically, BLACKLISTED. Thank you.</center></strong></p> 
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="col-lg-6">
                        
                  
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