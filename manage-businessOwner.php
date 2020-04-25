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
   
    <title>Manage Business Owner</title>
   

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

  <?php include_once('includes/superAdminSidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

     <?php include_once('includes/header.php');?>
     <script src="jquery-3.4.1.min.js"></script>
   <script>
     function getOwnerId(id){
        let ownerId = id;
        window.location.href ="edit-businessOwner-detail.php?editid="+ownerId;
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
                                    <li><a href="superAdminDashboard.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Dashboard</a></li>
                                    <li><a href="manage-businessOwner.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Business Owner</a></li>
                                    <li class="active">Manage Business Owner</li>
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
                            <strong class="card-title">Search Business Owner</strong>
                        </div>
                        <div class="card-body">
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="search">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Search By Owner Name</label></div>
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
            
                 
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Date Become Owner</th>
                    <th>Status</th>
                   
                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select *from  tblbusinessowner where businessOwnerName like '$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['businessOwnerName'];?></td>
                  <td><?php  echo $row['companyName'];?></td>
                  <td><?php  echo $row['dateOfRegistration'];?></td>
                  <td><?php  echo $row['status'];?></td>
                  
                  <td><button onclick='getOwnerId("<?php echo $row['ownerId'];?>")'>Edit</button></td>
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
                            <strong class="card-title">List of All Business Owner</strong>
                        </div>
                        <div class="card-body">
                             <div class="scrollable">
                              <table class="table" id="myTable">
                <thead>
                                        <tr>
                                            <tr>
                  <th>No.</th>
                     <th>Owner Name</th>
                      <th>Company Name</th>
                    <th>Date Become Owner</th>
                       <th>Status</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select *from  tblbusinessowner");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                   <td><?php  echo $row['businessOwnerName'];?></td>
                    <td><?php  echo $row['companyName'];?></td>
                     <td><?php  echo $row['dateOfRegistration'];?></td>
                  <td><?php  echo $row['status'];?></td>
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