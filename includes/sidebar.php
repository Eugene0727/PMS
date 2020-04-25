<?php $id = $_GET['id']; ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
     <script src="jquery-3.4.1.min.js"></script>
   <script>
     $(document).ready(function(){
            $("a[target='_addCat']").click(function(){
              alert("Category is empty. Add Category first.");
            });
            $("a[target='_addVehicleSlot']").click(function(){
              alert("Parking Slot Name is empty. Add Parking Slot first.");
            });
             $("a[target='_addAvailableSlot']").click(function(){
              alert("There is no Available Slot yet.");
            });
             $("a[target='_addCustomer']").click(function(){
              alert("There is no customer yet.");
            });
        });
</script>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php?id=<?php $id = $_SESSION['id']; echo $id?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Vehicle Category</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="add-category.php?id=<?php $id = $_SESSION['id']; echo $id?>">Add Category</a></li>
                            <?php $sql = mysqli_query($con,"select categoryId from tblcategory where areaId='$id'");
                                    $num=mysqli_num_rows($sql); if($num == 0){ ?>
                                 <li><i class="fa fa-table"></i><a target="_addCat">Manage Category</a></li>
                            <?php }else{ ?>
                                 <li><i class="fa fa-table"></i><a href="manage-category.php?id=<?php $id = $_SESSION['id']; echo $id?>">Manage Category</a></li>
                            <?php }?>
                        </ul>
                    </li>
                       <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Parking Slot Info</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php if($num == 0){ ?>
                            <li><i class="fa fa-table"></i><a target='_addCat'>Add Parking Slot</a></li>
                            <li><i class="fa fa-table"></i><a target='_addCat'>Manage Parking Slot</a></li>
                        <?php }else{ $sql2 = mysqli_query($con,"select slotId from tblparkingslot where areaId='$id'");
                               $num2=mysqli_num_rows($sql2);?>
                             <li><i class="fa fa-table"></i><a href="add-parkingSlot.php?id=<?php $id = $_SESSION['id']; echo $id?>">Add Parking Slot</a></li>
                             <?php if($num2 == 0){ ?>
                                 <li><i class="fa fa-table"></i><a target="_addVehicleSlot">Manage Parking Slot</a></li>
                                <?php }else{ ?>
                                     <li><i class="fa fa-table"></i><a href="manage-parkingSlot.php?id=<?php $id = $_SESSION['id']; echo $id?>">Manage Parking Slot</a></li>
                                <?php } ?>
                             
                        <?php }?>
                        </ul>
                    </li>
                    <li>
                         <?php /*$sql2 = mysqli_query($con,"select categoryId from tblcategory where areaId='$id'");
                               $num2=mysqli_num_rows($sql2); 
*/                 $isVerify = mysqli_query($con,"select slotId from tblparkingslot where areaId='$id' AND status='Available'");
                  $num4=mysqli_num_rows($isVerify);
                               if($num == 0 || $num2 == 0){ 
                                    if($num != 0){ ?>
                                        <a target="_addVehicleSlot"> <i class="menu-icon ti-email"></i>Add Vehicle </a>
                                    <?php }else{ ?>
                                        <a target="_addCat"> <i class="menu-icon ti-email"></i>Add Vehicle </a>
                                    <?php } ?>
                               <?php }else if($num4 == 0){ ?>
                                        <a target="_addAvailableSlot"> <i class="menu-icon ti-email"></i>Add Vehicle </a>
                        <?php }else{ ?>
                             <a href="add-vehicle.php?id=<?php $id = $_SESSION['id']; echo $id?>"> <i class="menu-icon ti-email"></i>Add Vehicle </a>
                        <?php }?>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Manage Customer</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="listOfReservedCustomer.php?id=<?php $id = $_SESSION['id']; echo $id?>">List of Customer in Reservation</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="list-blacklist.php?id=<?php $id = $_SESSION['id']; echo $id?>">List of Blacklisted</a>
                           
                        </li>

                        </ul>
                    </li>
                    <?php $sql3 = mysqli_query($con,"select ReferenceNo from tblcustomer where areaId='$id'");
                        $num3=mysqli_num_rows($sql3); if($num3 == 0){ ?>
                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a target="_addCustomer">Between Dates Reports</a></li>
                           
                        </ul>
                    </li>
<li>
                        <a target="_addCustomer"> <i class="menu-icon ti-email"></i>Search Vehicle </a>
                    </li>
                    <?php }else{ ?>
                         <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="bwdates-report-ds.php?id=admin">Between Dates Reports</a></li>
                           
                        </ul>
                    </li>
<li>
                        <a href="search-vehicle.php?id=<?php $id = $_SESSION['id']; echo $id?>"> <i class="menu-icon ti-email"></i>Search Vehicle </a>
                    </li>
                    <?php }?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
</body>
</html>
