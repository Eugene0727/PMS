<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/function.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    global $con;
    date_default_timezone_set("Asia/Manila");
    $date = date("y-m-d");
    $ownerId = get_owner_lastId();
    $companyName = $_POST['companyName'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $contact = $_POST['contactNo'];
    $email = $_POST['emailAdd'];

    if($companyName == '' || $sex == 0){
        $msg = 'Complete the information needed.';
    }
    else{
         $sql = mysqli_query($con, "select areaId from tblbusinesspartner where companyName='$companyName'");
        $result = mysqli_fetch_array($sql);

        $areaId = $result['areaId'];
    
        $query = mysqli_query($con, "insert into  tblbusinessowner values('$ownerId','$name','$companyName','$sex',NULL,NULL,'$contact','$email','Active','$date','$areaId')");
        if ($query){
            echo "<script>alert('Business Owner Detail has been added');</script>";
            echo "<script>window.location.href ='add-businessOwner.php'</script>";
        }
        else
        {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
        }
    }
}
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>Add Business Owner</title>
   

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
                                    <li><a href="add-businessOwner.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Business Owner</a></li>
                                    <li class="active">Add Business Owner</li>
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
                                <strong>Add </strong> Business Owner
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                          <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Company Name</label></div>
                                        <div class="col-12 col-md-9">
                                           <select name="companyName" id="companyName" class="form-control">
                                                <option value="0">Select Company Name</option>
                                                <?php $query=mysqli_query($con,"select * from tblbusinesspartner");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row['companyName'];?>"><?php echo $row['companyName'];?></option>
                  <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="name" name="name" class="form-control" placeholder="Name" required="true"></div>
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
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Contact Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="contactNo" name="contactNo" class="form-control" placeholder="Contact Number" required="true" minlength='11' maxlength="11" pattern="[0-9]+"></div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email Address</label></div>
                                        <div class="col-12 col-md-9"><input type="email" id="emailAdd" name="emailAdd" class="form-control" placeholder="Email Address" required="true"></div>
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