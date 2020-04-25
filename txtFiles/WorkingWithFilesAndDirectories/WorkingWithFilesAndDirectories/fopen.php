<!DOCTYPE html>
<html>
<head>
	<title>Read File (fopen)</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/w3.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

</head>
<body style="background-image:url('images/green.jpg');">


<?php 
	$myfile = fopen("txtfiles/txtfiles.txt", "r") or die("Unable to open file !");
	echo fread($myfile, filesize("txtfiles/txtfiles.txt"));
	fclose($myfile);
?>


</body>
</html>