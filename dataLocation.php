<?php
session_start();
header('Content-Type: application/json');

include('includes/dbconnection.php');

$sqlQuery = "SELECT * FROM tblbusinesspartner ORDER BY areaId";

$result = mysqli_query($con,$sqlQuery);

$data = array();
$ctr = 0;
foreach ($result as $row) {
	$data[] = $row;
	$ctr++;
}

$_SESSION['ctr'] = $ctr;
mysqli_close($con);

echo json_encode($data);
?>