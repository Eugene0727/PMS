<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/function.php');
if(isset($_POST['login'])){
    date_default_timezone_set("Asia/Manila");
    $dateEncoded = date("Y-m-d");
    $fileNameDate = date("Y")."_".date("m")."_".date("d");
    $timeEncoded = date("h:i:s a");

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fileName = fopen("txtfiles/Login_".$fileNameDate.".txt", "a") or die("Unable to open file!");
    $user = "$username<br>\n";
    $pass = "$password<br>\n";
    $date = "$dateEncoded<br>\n";
    $time = "$timeEncoded<br>\n";
//Credentials Checker
    $queryAdmin = mysqli_query($con,"SELECT ID FROM tbladmin WHERE UserName = '$username' && Password = '$password'");
    $queryCustomer = mysqli_query($con,"SELECT peopleID FROM tblpeoplelist WHERE UserName = '$username' && Password = '$password'");
    $ret1 = mysqli_fetch_array($queryAdmin);
    $ret2 = mysqli_fetch_array($queryCustomer);
//Test for login sends "Invalid Details" if wrong username/password or account does not exist
    if($ret1>0){
        $_SESSION['vpmsaid']=$ret1['ID'];
        header('location:dashboard.php');
    }
    else if ($ret2>0) {
        $query = mysqli_query($con,"SELECT * FROM tbladmin");
        $row = mysqli_num_rows($query);
        $_SESSION['vpmsaid']=$ret2['ID'] + $row;
        header('location:dashboard.php');
    }
    else{
        $msg="Invalid Details.";
    }

    fwrite($fileName, $user.$pass.$date.$time);
    fclose($fileName);
}
  ?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>Login Page</title>
   

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
<body class="bglogin-form">
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
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div id="error">
                                            </div><br><br>
                        <div class="form-group">
                            <label>User Name</label>
                           <input class="form-control" type="text" placeholder="Username" required="true" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password-field" class="form-control" name="password" placeholder="Password" required="true">
                            <span toggle='#password-field' class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="checkbox">
                            
                            <label class="pull-right">
                                <a href="forgot-password.php">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button><br><br>
                            <center><a href="register.php">SIGN UP</a></center>
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
