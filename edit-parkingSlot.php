<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$id = $_SESSION['id'];
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $aid=$_SESSION['vpmsaid'];
    $slotNo=$_POST['slotNumber'];
    $vehicleType = $_POST['typeOfVehicle'];
    $eid=$_GET['editid'];

    $currentSlot = mysqli_query($con, "select slotName from tblparkingslot where slotId='$eid'");
    $result = mysqli_fetch_array($currentSlot);

    $oldSlot = $result['slotName'];

    $verifySlot = mysqli_query($con, "update tblcustomer set ParkingSlot='$slotNo' where ParkingSlot='$oldSlot'");

    $oldCat = $_SESSION['oldSlotCat'];

    if($oldSlot != $slotNo){
        $sql = mysqli_query($con, "select categoryId from tblparkingslot where slotName='$slotNo' AND areaId='$id'");
        $num=mysqli_num_rows($sql);
        if($num == 0){
            $query=mysqli_query($con, "update tblparkingslot set slotName='$slotNo',categoryId= '$vehicleType' where slotId='$eid'");
            if ($query) {
                echo "<script>alert('Parking Number has been updated.');</script>";
                echo "<script>window.location.href ='manage-parkingSlot.php?id=$id'</script>";
            }
            else
            {
                $msg="Something Went Wrong. Please try again";
            }
        }
        else{
            echo "<script>alert('Parking Number already exist.');</script>";
        }
    }
    else if($oldCat != $vehicleType && $oldSlot == $slotNo){
        $query1=mysqli_query($con, "update tblparkingslot set categoryId= '$vehicleType' where slotId='$eid'");
        if ($query1) {
            echo "<script>alert('Parking Number`s Category has been updated.');</script>";
            echo "<script>window.location.href ='manage-parkingSlot.php?id=$id'</script>";
        }       
    }
    else{
        echo "<script>window.location.href ='manage-parkingSlot.php?id=$id'</script>";
    }

  }
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>Edit Parking Slot</title>
   

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
                                    <li><a href="manage-parkingSlot.php?id=<?php $id = $_SESSION['id']; echo $id?>">Parking Slot</a></li>
                                    <li class="active">Update Parking Slot</li>
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
                                <strong>Update </strong> Parking Slot
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                     
                     <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblparkingslot where slotId='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>              
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Slot Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="slotNumber" name="slotNumber" class="form-control" placeholder="Slot Number" required="true" value="<?php  echo $row['slotName'];?>"></div>
                                    </div>
<?php }
 ?>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Vehicle Category</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="typeOfVehicle" id="typeOfVehicle" class="form-control">
                                                <option value="0">Select Category</option>
                                                <?php $query=mysqli_query($con,"select * from  tblcategory where areaId='$id'");
              while($result=mysqli_fetch_array($query))
              {
                            $sql2=mysqli_query($con,"select categoryId from  tblparkingslot where slotId='$cid'");
                            $result2 = mysqli_fetch_array($sql2);
                                                if($result2['categoryId'] == $result['categoryId']){
              ?>                               
                                                 <option value="<?php $_SESSION['oldSlotCat'] = $result['categoryId']; echo $result['categoryId'];?>" selected><?php echo $result['VehicleCat'];?></option>
                  <?php }else{  ?> 
                                                 <option value="<?php echo $result['categoryId'];?>"><?php echo $result['VehicleCat'];?></option> <?php } }?>
                                            </select>
                                        </div>
                                    </div>
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Update</button></p>
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