<?php
session_start();
/*error_reporting(0);*/
include('includes/dbconnection.php');
include('includes/function.php');
if(strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{
    $name = $contact = $plateNo = $BLId = $area = '';
    $id = $_GET['id'];
    $BLId = get_blacklistedCustomer_lastId();

    $sql = "SELECT * FROM tblcustomer where ReferenceNo='$id'";
    $results = mysqli_query($con, $sql);
    if(!$results){
      echo "<script>alert('Something went wrong.');</script>";
    }
    $result = mysqli_fetch_array($results);
    $name = $result['OwnerName'];
    $_SESSION['blacklistName'] = $name;
    $contact = $result['OwnerContactNumber'];
    $plateNo = $result['PlateNo'];
    $area = $result['areaId'];
    $slot = $result['ParkingSlot'];

    date_default_timezone_set("Asia/Manila");
    $dateTime = date("y-m-d")." ".date("h:i:s");

    $start = strtotime($result['InTime']); 
    $end = strtotime($dateTime); 
    $difference = abs($end - $start)/3600; 

    $bill = mysqli_query($con,"update tblcustomer set OutTime ='$dateTime',Bill = round($difference * 15) where ReferenceNo='$id'");

    $sql2 = mysqli_query($con,"update tblparkingslot set status='Available' where slotName='$slot' AND areaId='$area'");

    $query=mysqli_query($con, "INSERT INTO tblblacklist VALUES('$BLId','$name','$contact','$plateNo','$area')");
    if ($query) {
        echo "<script>alert('Customer has been added to black list.');</script>";
        $query2=mysqli_query($con, "update tblcustomer set remarks='Blacklisted' where ReferenceNo='$id'");
         echo("<script>window.location.href ='list-blacklist.php?id=$id'</script>");
     }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
?>
