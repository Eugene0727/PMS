<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $aid=$_SESSION['vpmsaid'];
    $ownerName=$_POST['ownerName'];
    $companyName=$_POST['companyName'];
    $status=$_POST['status'];
    $eid=$_GET['editid'];

    $getAreaId = mysqli_query($con, "select areaId from tblbusinesspartner where companyName='$companyName'");
    $area = mysqli_fetch_array($getAreaId);
    $areaId = $area['areaId'];
   
    $query=mysqli_query($con, "update tblbusinessowner set businessOwnerName='$ownerName',companyName='$companyName',status='$status',areaId='$areaId' where ownerId='$eid'");
    if ($query) {
        echo "<script>alert('Business Owner Information has been updated');</script>";
        echo("<script>window.location.href ='manage-businessOwner.php'</script>");
    }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
  }
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>Edit Business Owner</title>
   

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
   <?php include_once('includes/superAdminSidebar.php');?>
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
                                    <li><a href="manage-businessOwner.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Business Owner</a></li>
                                    <li class="active">Update Business Owner</li>
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
                                <strong>Update </strong> Business Owner
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                     
                     <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblbusinessowner where ownerId='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>              
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Company Name</label></div>
                                        <div class="col-12 col-md-9">
                                           <select name="companyName" id="companyName" class="form-control">
                                                <option value="<?php echo $row['companyName'];?>">Select Company Name</option>
                                                <?php $query=mysqli_query($con,"select * from tblbusinesspartner");
              while($row1=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row1['companyName'];?>"><?php echo $row1['companyName'];?></option>
                  <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownerName" name="ownerName" class="form-control" placeholder="Owner Name" required="true" value="<?php  echo $row['businessOwnerName'];?>"></div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="status" name="status" class="form-control" placeholder="Status" required="true" value="<?php  echo $row['status'];?>"></div>
                                    </div>
                                 
                                    <?php } ?>
                                    
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