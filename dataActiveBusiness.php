<?php
header('Content-Type: application/json');

include('includes/dbconnection.php');

$sqlQuery = "SELECT areaId,status FROM tblbusinesspartner ORDER BY areaId";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>