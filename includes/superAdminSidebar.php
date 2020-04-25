<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
         <script src="jquery-3.4.1.min.js"></script>
   <script>
     $(document).ready(function(){
            $("a[target='_addPartner']").click(function(){
              alert("There is no Business Partners yet.");
            });
        });
</script>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="superAdminDashboard.php?id=<?php $id = $_SESSION['adminId']; echo $id?>"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                   
                      
                       <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Business Partners Info</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="add-businessPartner.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Add Business Partner</a></li>
                            <?php $sql = mysqli_query($con,"select areaId from tblbusinesspartner"); $num=mysqli_num_rows($sql); 
                                if($num == 0){ ?>
                                <li><i class="fa fa-table"></i><a target="_addPartner">Manage Business Partner</a></li>
                            <?php }else{ ?>
                                 <li><i class="fa fa-table"></i><a href="manage-businessPartner.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Manage Business Partner</a></li>
                             <?php }?>
                        </ul>
                    </li>
                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Business Owner Info</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php if($num == 0){ ?>
                                        <li><i class="fa fa-table"></i><a target="_addPartner">Add Business Owner</a></li>
                            <li><i class="fa fa-table"></i><a target="_addPartner">Manage Business Owner</a></li>
                             <?php }else{ ?>
                                <li><i class="fa fa-table"></i><a href="add-businessOwner.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Add Business Owner</a></li>
                            <li><i class="fa fa-table"></i><a href="manage-businessOwner.php?id=<?php $id = $_SESSION['adminId']; echo $id?>">Manage Business Owner</a></li>
                             <?php }?>
                        </ul>
                    </li>
                     <?php if($num == 0){ ?>
                         <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a target="_addPartner">Between Dates Reports</a></li>
                           
                        </ul>
                    </li>
<li>
                        <a target="_addPartner"> <i class="menu-icon ti-email"></i>Search Business Partner</a>
                    </li>

                    <?php }else{ ?>
                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="superAdminReports.php?id=superadmin">Between Dates Reports</a></li>
                           
                        </ul>
                    </li>
<li>
                        <a href="businessPartnerDueDate.php?id=<?php $id = $_SESSION['adminId']; echo $id?>"> <i class="menu-icon ti-email"></i><center>Business Partners' Due Date</center></a>
                    </li>
                      <?php }?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
</body>
</html>
