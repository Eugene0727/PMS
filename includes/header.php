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
<!--     <link rel="stylesheet" href="assets/css/scrollbar.css"> -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="notif.css"> -->
  <script src="jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".notif_icon .fa-bell").click(function(){
        $(".dropdown").toggleClass("active");
      });
    });
  </script>
  <style type="text/css">
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Montserrat', sans-serif;
    }
    .notif_wrapper{
      width: 500px;
      margin: 120px auto 0;
    }
    .notif_wrapper .notif_icon{
      position: absolute;
      width: 50px;
      height: 50px;
      font-size: 25px;
      margin: -160px auto;
      margin-left: 1325px;
      text-align: center;
      color: #605dff;
      float: right;
    }
    .notif_wrapper .notif_icon .fa-bell{
      cursor: pointer; 
    }
    .notif_wrapper .dropdown{
      width: 250px;
      height: 250px;
      overflow: auto;
      background: #fff;
      border-radius: 5px;
      box-shadow: 2px 2px  3px rgba(0,0,0,125);
      margin: -110px auto 0;
      margin-left: 1090px;
      padding: 15px;
      position: absolute;
      display: none;
    }
    .notif_wrapper .dropdown .notif_item{
      display: flex;
      align-items: center;
      padding: 10px 0;
      border-bottom: 1px solid #dbdaff;
    }
    .notif_wrapper .dropdown .notif_item:last-child{
      border-bottom: 0px;
    }
    .notif_wrapper .dropdown .notif_item .notif_info p span{
      color: #605dff;

    }
    .notif_wrapper .dropdown .notif_item .notif_info .notif_time{
      color: #c5c5a6;
      font-size: 12px;
    }
    .notif_wrapper .dropdown:before{
      content: "";
      position: absolute;
      top: -30px;
      left: 72%;
      transform: translateX(-50%);
      border:  15px solid;
      border-color: transparent transparent #fff transparent;
    }
    .notif_wrapper .dropdown.active{
      display: block;
    }
</style>
   <style>
       .link {
  position: absolute;
  font-size: 27px;
  bottom: 7px; left: 30px;
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
                    <?php if($adminId == ''){ ?>
                          <a class="navbar-brand" href="dashboard.php?id=<?php echo $clientId?>"><a class="link" href="dashboard.php?id=<?php echo $clientId?>"><b> &larr; ADMIN &rarr;</b></a>
                    <?php }else{ ?>
                     <a class="navbar-brand" href="superAdminDashboard.php?id=<?php echo $adminId?>"><a class="link" href="superAdminDashboard.php?id=<?php echo $adminId?>"><b> &larr; SUPER ADMIN &rarr;</b></a>
                    <?php } ?>
                    <!-- <a class="navbar-brand" href="dashboard.php"><img src="images/logo1.png" alt="Logo"></a> -->
                    <a class="navbar-brand hidden" href="./"><img src="images/logo3.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    <div class="user-area dropdown float-right">
    <div class="notif_wrapper">
      <div class="notif_icon">
        <i class="fas fa-bell">
          <span class="count">
<?php if($adminId == ''){
  $sql = mysqli_query($con,"select * from tblnotification where status='unread' AND areaId='$clientId' order by date DESC");
}else{
   $sql = mysqli_query($con,"select * from tblnotification where status='unread' AND notifTo='superAdmin' order by date DESC");
}
                        $num=mysqli_num_rows($sql); echo $num; ?>
          </span>
        </i>
      </div>
      <div class="notifScroll">
      <div class="dropdown">
         <?php if($num != 0){
                    while($notif = mysqli_fetch_array($sql)){ 
          ?>
        <div class="notif_item">
          <div class="notif_info">
            <span class="notif_time"><?php echo date('F j,Y, h:i A',strtotime($notif['date'])); ?></span>
            <p><?php echo $notif['message'];?></p>
          </div>
        </div>
         <?php }
                    }else{ 
                    echo "No notification yet.";
        } ?>
      </div>
    </div>
      </div>
    </div>
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
        