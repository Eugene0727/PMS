<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/function.php');
$id = $_GET['id'];
$cat = $_COOKIE['selectedCat']; 
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    global $con;
    date_default_timezone_set("Asia/Manila");
    $dateTime = date("y-m-d")." ".date("h:i:s");
    $reference= get_customer_lastId();
    $brandId = get_brand_lastId();
    $slotNo = $_POST['slotNumber'];
    $catename=$_POST['catename'];
    $vehbrand=$_POST['vehicleBrand'];
    $plateNo=$_POST['plateNumber'];
    $ownername=$_POST['ownername'];
    $ownercontno=$_POST['ownercontno'];
    $sex = $_POST['sex'];

    if($catename == 0 || ($slotNo == '' || $slotNo == 0) || $sex == 0){
        $msg = 'Complete the information needed.';
    }
    else{
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
   /* $sql = mysqli_query($con, "select categoryId from tblcategory where VehicleCat='$catename'");
    $sqlResult = mysqli_fetch_array($sql);
    $catId = $sqlResult['categoryId'];*/

    $sql2 = mysqli_query($con, "select brandId from tblbrand where brandName='$vehbrand'");
    $sql2Result = mysqli_fetch_array($sql2);
    $vehBrandId = $sql2Result['brandId'];

    $sql3 = mysqli_query($con, "select customerName from tblblacklist where customerName='$ownername'");
    $result3 = mysqli_fetch_array($sql3);
    $sql4 = mysqli_query($con, "select customerPlateNo from tblblacklist where customerPlateNo='$plateNo'");
    $result4 = mysqli_fetch_array($sql4);


    if($result3['customerName'] != $ownername && $result4['customerPlateNo'] != $plateNo){
            $query = mysqli_query($con, "insert into  tblcustomer values('$reference','$slotNo','$catename','$vehBrandId','$plateNo','$ownername','$sex','$ownercontno','$dateTime',NULL,'None',NULL,'$id')");
         if ($query){
            echo "<script>alert('Vehicle Entry Detail has been added');</script>";
             $query2 = mysqli_query($con, "update tblparkingslot set status='Occupied' where slotName='$slotNo'");
            echo "<script>window.location.href ='get-referenceNo.php?id=$id'</script>";
         }
         else
         {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
         } 
    }
    else{
         echo "<script>alert('This customer is in the blacklist!');</script>";      
    }
    }
}
echo("<script>document.cookie = escape('selectedCat') + '=' + escape(' ') + '; path=/';</script>");
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>Add Vehicle</title>
   

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
              window.location.href ='add-vehicle.php?id='+ id;
            });
        });
</script>
   <?php include_once('includes/sidebar.php');?>
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
                                    <li><a href="add-vehicle.php?id=<?php $id = $_SESSION['id']; echo $id?>">Vehicle</a></li>
                                    <li class="active">Add Vehicle</li>
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
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add </strong> Vehicle
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                   
                                      <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Vehicle Category</label></div>
                                        <div class="col-12 col-md-9">
                                          <select name="catename" id="catename" class="form-control" selected='<?php echo $cat?>'>
                                             <?php if($cat == " "){ ?>
                                                <option value="0" selected>Select Category</option> <?php } ?>
                                                <?php $query=mysqli_query($con,"select * from tblcategory where areaId='$id'");
              while($row=mysqli_fetch_array($query))
              {
                $catId = $row['categoryId'];
                $isVerify = mysqli_query($con,"select slotId from tblparkingslot where categoryId='$catId' AND status='Available' AND areaId='$id'");
                $num=mysqli_num_rows($isVerify);
                if($num == 0){
                  continue;
                }
                else{
              ?>                  <?php if($row['categoryId'] == $cat){ ?>
                                 <option value="<?php echo $row['categoryId'];?>" selected><?php echo $row['VehicleCat'];?></option> <?php }else{ ?>
                                                 <option value="<?php echo $row['categoryId'];?>"><?php echo $row['VehicleCat'];?></option><?php } ?>
                  <?php }}?> 
                                            </select> 
                                         <!--    <select name="catename" id="catename" class="form-control">
                                                <option value="0">Select Category</option>
                                                <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                                            </select> -->
                                        </div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Parking Slot</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="slotNumber" id="slotNumber" class="form-control">
                                                <option value="0">Select Slot Number</option>
                                                <?php $query=mysqli_query($con,"select * from tblparkingslot where areaId ='$id' AND status='Available' AND categoryId='$cat'");
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
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Sex</label></div>
                                        <div class="col-12 col-md-9">
                                           <select name="sex" id="sex" class="form-control">
                                                <option value="0">Select Sex</option>
                                                 <option value="1">Female</option>
                                                 <option value="2">Male</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Contact Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownercontno" name="ownercontno" class="form-control" placeholder="Owner Contact Number" required="true" minlength='11' maxlength="11" pattern="[0-9]+"></div>
                                    </div>
                                   
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Add</button></p>
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