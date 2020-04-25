<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/function.php');

if(isset($_POST['register']))
  {
    $newId = get_people_lastId();
    $companyName = $_POST['companyName'];
    $userName=$_POST['username'];
    $password=md5($_POST['password']);
    $name = $_POST['name'];
        $id = $_GET['id'];
         global $con;
         date_default_timezone_set("Asia/Manila");
        $date = date("y-m-d");
        $newId = get_admin_lastId();
        $contact=$_POST['contact'];
        $email=$_POST['email'];

        $query1=mysqli_query($con,"insert into tbladmin values('$newId','$name','$userName','$contact','$email','$password','$date')");
        if ($query1){
            echo "<script>alert('Account has been added');</script>";
            echo "<script>window.location.href ='admin-register.php'</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

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
                         <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <input type="hidden" name="_token" value="cgyIluSERsGxnNMMVRf2rv3xz2rqQbsrTPoVwW6d">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>REGISTER ACCOUNT</h3>
            <div id="error">
                                            </div><br><br>
                                     <div class="form-group">
                            <label>Name</label>
                           <input class="form-control" type="text" placeholder="Name" required="true" name="name">
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="true">
                        </div>
                         <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" name="email" placeholder="Email Address" required="true">
                        </div>
                        <div class="form-group">
                            <label>User Name</label>
                           <input class="form-control" type="text" placeholder="Username" required="true" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                        </div>
                        <button type="submit" name="register" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>
                       
                       
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