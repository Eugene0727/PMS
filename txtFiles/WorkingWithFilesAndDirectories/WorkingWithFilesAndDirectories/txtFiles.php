<!DOCTYPE html>
<html>
<head>
	<title>Text Files</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/w3.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="js_css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

</head>
<body style="background-image:url('images/green.jpg');">
<div class="wrapper">    
  <section class="hoc container clear">
  	<div id="comments">
  		<form method="post">
  			<h6 class="heading"> Login</h6>
	  		<div class="one_half first">
		        <label for="username">Username: 
		          <span class="errorUsername">* </span></label>
		        <input type="text" name="username" id="username">
		    </div>

	        <div class="one_half first">
	            <label for="password">Password: 
	              <span class="errorPassword">* </span></label>
	            <input type="password" name="password" id="password">
	        </div>

	        <div class="one_third first">
	        	<button class="btn btn-success" type="submit" name="btnLogin"
	        		style="width: 100%;"><i class="fa fa-save"> Save</i></button>
	        </div>
        </form>
  	</div>
  </section>
</div>

<?php 
if(isset($_POST['btnLogin'])){
	date_default_timezone_set("Asia/Manila");
	$dateEncoded = date("Y-m-d");
	$timeEncoded = date("h:i:s A");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$fileName = fopen("txtfiles/txtfiles.txt", "a") or die("Unable to open file!");
	$txt = "$username | $password | $dateEncoded | $timeEncoded |<br>\n";
	fwrite($fileName, $txt);
	fclose($fileName);
}
?>


</body>
</html>