<?php
session_start();
/*error_reporting(0);*/
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>Manage Category</title>
   

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

</head>
<body>
    <!-- Left Panel -->

  <?php include_once('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

     <?php include_once('includes/header.php');?>
      <script src="jquery-3.4.1.min.js"></script>
   <script>
    let counter = 0;
     $(document).ready(function(){
            $(".isOccupied").click(function(){
              alert('Category is use in an Occupied Parking Slot. Cannot be modify.');
            });
             $(".isReserved").click(function(){
              alert('Category is use in a Reserved Parking Slot. Cannot be modify.');
            });
           /* $(".isNotOccupied").click(function(){
              //let slotId = getSlotId();
              //alert(slotId);
              //window.location.href ="edit-parkingSlot.php?editid=slotId";
            });*/
        });

     function getSlotId(id){
        let slotId = id;
        window.location.href ="edit-category.php?editid="+slotId;
     }
     function createCatArray(category){
        let arr = [];
        arr[counter] = category;
        return arr;
        /*alert(category);*/
     }
</script>

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
                                    <li><a href="dashboard.php?id=<?php $id = $_SESSION['id']; echo $id?>">Dashboard</a></li>
                                    <li><a href="manage-category.php?id=<?php $id = $_SESSION['id']; echo $id?>">Category</a></li>
                                    <li class="active">Manage Category</li>
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
                   
         

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Manage Category</strong>
                        </div>
                        <div class="card-body">
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                 
                    <th>Category</th>
                   
                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
               $id = $_GET['id'];
$sql = mysqli_query($con,"select tblcategory.*, tblparkingslot.status
FROM tblcategory INNER JOIN tblparkingslot on tblcategory.categoryId = tblparkingslot.categoryId
WHERE tblparkingslot.areaId ='$id' GROUP BY tblcategory.VehicleCat ORDER BY tblcategory.categoryId");
$cnt=1;
while ($row=mysqli_fetch_array($sql)) {
?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                        <td><?php echo $row['VehicleCat'];?></td>
                        <script>createCatArray("<?php $catId = $row['categoryId']; echo $catId; ?>");</script>
                        <?php if($row['status'] == 'Occupied'){ ?>
                          <td><button class="isOccupied">Edit Details</button></td> 
                        <?php }else if($row['status'] == 'Reserved'){ ?>
                           <td><button class="isReserved">Edit Details</button></td>
                        <?php }else{ ?> 
                        <td><button onclick="getSlotId('<?php $categoryId = $row["categoryId"]; echo $categoryId ?>')">Edit Details</button></td>
                      <?php } ?>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
              </table>

                    </div>
                </div>
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