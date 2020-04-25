<?php
session_start();
/*error_reporting(0);*/
include('includes/dbconnection.php');
include('includes/function.php');
$userName = $_SESSION['userName'];
$id = $_GET['id'];
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
/*$_SESSION['image'] = $target_dir.basename($_FILES["fileToUpload"]["name"]);*/
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) { 
    $sql1 = mysqli_query($con,"select * from tbladmin where UserName='$userName'");
    $result1 = mysqli_fetch_array($sql1);

    $sql2 = mysqli_query($con,"select * from tblbusinessowner where userName='$userName'");
    $result2 = mysqli_fetch_array($sql2);

     if($result1['UserName'] == $userName){
        $adminId = $result1['ID'];
        $clientId = NULL;
    }
    else if($result2['userName'] == $userName){
        $adminId = NULL;
        $clientId = $result2['ownerId'];
    }

    $ctr = 0;
    $profileId = get_profile_lastId();
    $picture = $_FILES["fileToUpload"]["name"];
    if($clientId == NULL){
       /* $isExist = mysqli_query($con,"select profileId from tblprofilepic where ID='$adminId'");
        while($isResult = mysqli_fetch_array($isExist)){
            $ctr = $ctr + 1;
        }*/
    /*    if($ctr == 0){*/
             $insertImg = mysqli_query($con,"insert into tblprofilepic values('$profileId','$picture',NULL,'$profileId')");
        /*}*/
      /*  else{
            $insertImg = mysqli_query($con,"update tblprofilepic set profilePic='$picture' where ID='$adminId'");
        }*/

         if(!$insertImg){
            echo("<script>alert('BITCH')</script>");
        }
    }
    else if ($adminId == NULL) {
        $isExist = mysqli_query($con,"select profileId from tblprofilepic where ownerId='$clientId'");
        while($isResult = mysqli_fetch_array($isExist)){
            $ctr = $ctr + 1;
        }
        if($ctr == 0){
             $insertImg = mysqli_query($con,"insert into tblprofilepic values('$profileId','$picture','$clientId',NULL)");
        }
        else{
            $insertImg = mysqli_query($con,"update tblprofilepic set profilePic='$picture' where ownerId='$clientId'");
        }

         if(!$insertImg){
            echo("<script>alert('BITCH')</script>");
        }
    }
 
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo("<script>alert('Your profile picture has been updated.'+$id)</script>");
         if($_GET['id'] > 0){
            header('location:admin-profile.php?id='.$id);
       /* echo("<script>window.location.href='admin-profile.php?id=$id</script>");*/
    }
    else{
         header('location:superAdmin-profile.php');
       /* echo("<script>window.location.href ='superAdmin-profile.php'</script>");*/
    }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
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

<h6 class="heading">Upload Image</h6>
<div id="comments">
<form method="post" enctype="multipart/form-data">
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