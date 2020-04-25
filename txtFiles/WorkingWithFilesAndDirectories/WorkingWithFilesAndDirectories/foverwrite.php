<!DOCTYPE html>
<html>
<head>
	<title>Read File</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/w3.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

</head>
<body style="background-image:url('images/green.jpg');">

<?php
	$myfile = fopen("txtFiles/newfile.txt", "w") or die("Unable to open file!");
	$txt = "Mickey Mouse\n";
	fwrite($myfile, $txt);
	$txt = "Minnie Mouse\n";
	fwrite($myfile, $txt);
	fclose($myfile);
?>

</body>
</html>