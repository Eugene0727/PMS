<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/w3.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

</head>
<body style="background-image:url('images/green.jpg');">

<img src="uploads/female.png" style="width: 25%;">
<h6 class="heading">Upload Image</h6>
<div id="comments">
<form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="one_half first">
    	Select image to upload:
    	<input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div class="one_half first">
    	<input type="submit" value="Upload Image" name="submit">
    </div>
</form>
</div>

</body>
</html>