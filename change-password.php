<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
$ownerId = $_SESSION['ownerId'];
$userName = $_SESSION['userName'];
$id = '';
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
    {
        $adminid=$_SESSION['vpmsaid'];
        $cpassword=md5($_POST['currentpassword']);
        $newpassword=md5($_POST['newpassword']);
        $confirmpassword = md5($_POST['confirmpassword']);

        $sql1 = mysqli_query($con,"select * from tbladmin where UserName='$userName'");
        $result1 = mysqli_fetch_array($sql1);

        $sql2 = mysqli_query($con,"select * from tblbusinessowner where userName='$userName'");
        $result2 = mysqli_fetch_array($sql2);
        if($result1['UserName'] == $userName){
        $id = 'admin';
        /*echo("<script>alert('hi')</script>");*/
    }
    else if($result2['userName'] == $userName){
        $id = 'client';
       /* echo("<script>alert('hello')</script>");*/
    }

    if($confirmpassword == $newpassword){
         if($id == 'client'){
            $query=mysqli_query($con,"select ownerId from tblbusinessowner where ownerId='$ownerId' and   password='$cpassword'");
            $row=mysqli_fetch_array($query);
            if($row>0){
                $ret=mysqli_query($con,"update tblbusinessowner set password='$newpassword' where ownerId='$ownerId'");
                if(!$ret){
                    echo "<script>alert('Something went wrong.');</script>";
                } 
                echo "<script>alert('Your password successully changed.');</script>";
            } else {
                echo "<script>alert('Your current password is incorrect.');</script>";
            }
        }
        else{
            $query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
            $row=mysqli_fetch_array($query);
            if($row>0){
                $ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
               if(!$ret){
                    echo "<script>alert('Something went wrong.');</script>";
                } 
                echo "<script>alert('Your password successully changed.');</script>";
            } else {
                echo "<script>alert('Your current password is incorrect.');</script>";
            }
        }
    }
    else{
        $msg = "Password does not match.";
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>Change Password</title>
   

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
     <link rel="stylesheet" href="assets/css/icon.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>

</head>
<body>
     <script src="jquery-3.4.1.min.js"></script>
   <script>
     $(document).ready(function(){
            $(".toggle-password").click(function(){
                $(this).toggleClass("fa-eye fa-eye-slash");
                let input = $($(this).attr("toggle"));
                if(input.attr("type") == "password"){
                    input.attr("type","text");
                }
                else{
                    input.attr("type","password");
                }
            });
            $(".toggle-password1").click(function(){
                $(this).toggleClass("fa-eye fa-eye-slash");
                let input = $($(this).attr("toggle"));
                let confirmInput = $("#password-field2");
                if(input.attr("type") == "password"){
                    input.attr("type","text");
                    confirmInput.attr("type","text");

                }
                else{
                    input.attr("type","password");
                    confirmInput.attr("type","password");
                }
            });
        });
</script>
    <?php if($id == 'client'){ ?>
         <?php include_once('includes/sidebar.php');?>        
    <?php }else{ ?>
          <?php include_once('includes/superAdminSidebar.php');?>                     
    <?php }?>
  
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
                                    <?php if($id == 'client'){ ?>
                                        <li><a href="dashboard.php">Dashboard</a></li>
                                    <?php }else{ ?>
                                        <li><a href="superAdminDashboard.php">Dashboard</a></li>
                                    <?php }?>
                                    
                                    <li><a href="change-password.php">Change Password</a></li>
                                    <li class="active">Change Password</li>
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
                                <strong>Change </strong> Password
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="changepassword" onsubmit="return checkpass();">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                   <?php
$adminid=$_SESSION['vpmsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Current Password</label></div>
                                        <div class="col-12 col-md-9">
                                             <input type="password" id="password-field" class="form-control" name="currentpassword" placeholder="Current Password" required="true">
                            <span toggle='#password-field' class="fa fa-fw fa-eye field-icon1 toggle-password"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">New Password</label></div>
                                        <div class="col-12 col-md-9">
                                         <input type="password" class="form-control" id="password-field1"  name="newpassword" placeholder="New Password" required="true">
                                        <span toggle='#password-field1' class="fa fa-fw fa-eye field-icon1 toggle-password1"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Confirm Password</label></div>
                                        <div class="col-12 col-md-9">
                                             <input type="password" class="form-control" id="password-field2"  name="confirmpassword" placeholder="Confirm Password" required="true">
                                       <!--  <span toggle='#password-field1' class="fa fa-fw fa-eye field-icon1 toggle-password1"></span> -->
                                        </div>
                                    </div>
                                   
                                  
                                    
                                    <?php } ?>
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Change</button></p>
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