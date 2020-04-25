<!DOCTYPE html>
<html>
<head>
	<title>Read File (fgets)</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/w3.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

</head>
<body style="background-image:url('images/green.jpg');">


<?php 
	$myfile = fopen("txtfiles/webdictionary.txt", "r") or die("Unable to open file !");
	echo fgets($myfile);
	fclose($myfile);
?>


</body>
</html>