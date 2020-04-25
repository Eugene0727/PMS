<?php 
session_start();
$userName = $_SESSION['userName'];
$adminId = $_SESSION['adminId'];
$clientId = $_SESSION['ownerId'];
/*echo"<script>let hi = '$clientId'; alert(hi)</script>";*/
$id = '';

 $sql1 = mysqli_query($con,"select * from tbladmin where UserName='$userName'");
    $result1 = mysqli_fetch_array($sql1);

    $sql2 = mysqli_query($con,"select * from tblbusinessowner where userName='$userName'");
    $result2 = mysqli_fetch_array($sql2);
    if($result1['UserName'] == $userName){
        $clientId = NULL;
        $id = 'admin';
        /*echo("<script>alert('hi')</script>");*/
    }
    else if($result2['userName'] == $userName){
        $adminId = NULL;
        $id = 'client';
       /* echo("<script>alert('hello')</script>");*/
    }
$sql =  mysqli_query($con,"select * from tblprofilepic");
while($row=mysqli_fetch_array($sql)){
    if($clientId == NULL){
       if($adminId == $row['ID']){
            $profilePic = $row['profilePic'];
            break;
       }
    }
    else if ($adminId == NULL){
        if($clientId == $row['ownerId']){
            $profilePic = $row['profilePic'];
            /*echo"<script>let hi = '$profilePic'; alert(hi)</script>";*/
            break;
       }
    }
}

?> <html class="no-js" lang="">
<head>
    

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
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
       .link {
 position: absolute;
  font-size: 27px;
  bottom: 4px; left: 55px;
  color: #828282;
  text-decoration: none;
}
  
 .link:focus{
    color: #c6e2ff;
    text-shadow:
    0 0 2px rgba(202,228,225,0.92),
    0 0 10px rgba(202,228,225,0.34),
    0 0 4px rgba(30,132,242,0.52),
    0 0 7px rgba(30,132,242,0.92),
    0 0 11px rgba(30,132,242,0.78),
    0 0 16px rgba(30,132,242,0.92);
  }

  .link:hover {
    color: #c6e2ff;
    text-shadow:
    0 0 2px rgba(202,228,225,0.92),
    0 0 10px rgba(202,228,225,0.34),
    0 0 4px rgba(30,132,242,0.52),
    0 0 7px rgba(30,132,242,0.92),
    0 0 11px rgba(30,132,242,0.78),
    0 0 16px rgba(30,132,242,0.92);
  }
}

   </style>
<div id="right-panel" class="right-panel">
<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                     <a class="navbar-brand" href="dashboard.php"><a class="link" href="dashboard.php"><b> &larr; ADMIN &rarr;</b></a>
                    <!-- <a class="navbar-brand" href="dashboard.php"><img src="images/logo1.png" alt="Logo"></a> -->
                    <a class="navbar-brand hidden" href="./"><img src="images/logo3.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        
                        <div class="form-inline">
                           
                        </div>

                     
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/<?php echo $profilePic;?>" alt="User Avatar">
                            <!-- <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar"> -->
                        </a>

                        <div class="user-menu dropdown-menu">
                            <?php if($id == 'client'){ ?>
                            <a class="nav-link" href="admin-profile.php?id=<?php $id = $_SESSION['id']; echo $id?>"><i class="fa fa- user"></i>My Profile</a>
                             <a class="nav-link" href="change-password.php?id=<?php $id = $_SESSION['id']; echo $id?>"><i class="fa fa -cog"></i>Change Password</a>
                            <?php }else{ ?>
                                 <a class="nav-link" href="superAdmin-profile.php?id=<?php $id = $_SESSION['adminId']; echo $id?>"><i class="fa fa- user"></i>My Profile</a>
                                  <a class="nav-link" href="change-password.php?id=<?php $id = $_SESSION['adminId']; echo $id?>"><i class="fa fa -cog"></i>Change Password</a>
                            <?php }?>
                            <a class="nav-link" href="index.php?id=<?php $id = $_SESSION['id']; echo $id?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        