<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/function.php');

if(isset($_POST['register']))
  {
    $newId = get_people_lastId();
    $userName=$_POST['username'];
    $password=md5($_POST['password']);
    $name = $_POST['ownername'];
    $_SESSION['verifyName'] = $name;

    $sql = mysqli_query($con,"select tblbusinessowner.businessOwnerName,tblbusinessowner.companyName,tblbusinesspartner.areaId from tblbusinesspartner inner join tblbusinessowner on tblbusinesspartner.areaId = tblbusinessowner.areaId where tblbusinessowner.businessOwnerName='$name' AND tblbusinesspartner.companyName = tblbusinessowner.companyName");
    $result = mysqli_fetch_array($sql);

    $sql2 = mysqli_query($con,"select OwnerName,areaId from tblcustomer where OwnerName='$name'");
    $result2 = mysqli_fetch_array($sql2);
   
    if($result['businessOwnerName'] == $name){
        $position = 1;
         $areaId = $result['areaId'];

         $update = mysqli_query($con,"update tblbusinessowner SET userName='$userName',password='$password' WHERE businessOwnerName='$name'");
         if(!$update){
            echo "<script>alert('Something went wrong.');</script>"; 
         }
    }
    else if($result2['OwnerName'] == $name){
        $position = 2;
         $areaId = $result2['areaId'];
    }
    /* echo "<script>let hi = '$name'; alert(hi);</script>"; 
    $blacklistsql = mysqli_query($con, "select customerName from tblblacklist where customerName='$name'");
    $blacklistResult = mysqli_fetch_array($blacklistsql);
    $blacklistName = $blacklistResult['customerName'];
    echo "<script>let hello = '$blacklistName'; alert(hello);</script>"; */

    $blacklistName = getBlacklist();
   
if($blacklistName != $name){
    if($result['businessOwnerName'] == $name || $position == 2){
        $query3=mysqli_query($con,"insert into tblpeoplelist values('$newId','$userName','$password','$position','$areaId')");
        if ($query3){
            echo "<script>alert('Account has been added');</script>";
            echo "<script>window.location.href ='index.php'</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
        }
    }
    else{
        echo "<script>alert('Cannot find your details.');</script>";       
    }
}
else{
  echo "<script>alert('Request cannot be proccessed, you are in the blacklist.');</script>";    
}

}
  ?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>Registration Page</title>
   

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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">
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
        });
</script>
     <div class="card-header">
         <div class="page-title">
         <ol class="breadcrumb text-right">
             <strong><li><a href="index.php">BACK</a></li></strong>
        </ol>
    </div>

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                   <!--  <a href="index.php">
                        <h2 style="color: #fff">Vehicle Parking Management System</h2>
                    </a> -->
                </div>
                <div class="login-form">
                    <form method="post">
                         <p style="font-size:16px; color:red" align="center"> <!-- <?php if($msg){
    echo $msg;
  }  ?> --> </p>
                        <input type="hidden" name="_token" value="cgyIluSERsGxnNMMVRf2rv3xz2rqQbsrTPoVwW6d">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>REGISTER ACCOUNT</h3>
            <div id="error">
                                            </div><br><br>
                            <div class="form-group">
                                <label for="text-input" class=" form-control-label">Name</label>
                                <input type="text" id="ownername" name="ownername" class="form-control" placeholder="Name" required="true">
                            </div>
                        <div class="form-group">
                            <label>User Name</label>
                           <input class="form-control" type="text" placeholder="Username" required="true" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password-field" class="form-control" name="password" placeholder="Password" required="true">
                            <span toggle='#password-field' class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <button type="submit" name="register" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button><br><br>
                        <p><strong>Note:</strong> If you are not yet a customer of any Parking Company here and you want to have reservation. Please click <strong><a href="reservation-form.php?id=0">HERE</a></strong>. Thank you.
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>