<?php include('includes/dbconnection.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGS</title>
</head>
<body style="background-color:white">
	<table border='1'>
	<th>User Name</th>
	<th>Password</th>
	<th>Date of Login</th>
	<th>Time of Login</th>
	<tr>

<?php 
	$myfile = fopen("txtfiles/Login_2020_03_11.txt", "r") or die("Unable to open file !");
	while(!feof($myfile)){
?>
	<td><?php echo fgets($myfile);?></td>
<?php 
}
?>
</tr>
<?php 
	fclose($myfile);
?>
</table>
</body>
</html>