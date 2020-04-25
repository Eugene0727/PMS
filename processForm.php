<?php
  session_start();
  include('includes/dbconnection.php');
  include('includes/function.php');
  $msg ="";
  $css_class="";
  $ctr = 0;
  $profileId = get_profile_lastId();
  $userName = $_SESSION['userName'];
  $uploadOk = 1;

  if(isset($_POST['save-user'])){
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["profileImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
    $profileId = get_profile_lastId();
    $picture = $_FILES["profileImage"]["name"];

    $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
    if(($check === false) || ($_FILES["profileImage"]["size"] > 500000) || ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif")){

        if ($_FILES["profileImage"]["size"] > 500000) {
            $msg = "Sorry your image is too large.";
            $css_class = "alert-danger";
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
             $msg = "Sorry only .jpg .png .jpeg .gif are allowed.";
            $css_class = "alert-danger";
        }

        $uploadOk = 0;
    } else {
        if($clientId == NULL){
          $isExist = mysqli_query($con,"select profileId from tblprofilepic where ID='$adminId'");
          while($isResult = mysqli_fetch_array($isExist)){
              $ctr = $ctr + 1;
          }
          if($ctr == 0){
              $insertImg = mysqli_query($con,"insert into tblprofilepic values('$profileId','$picture',NULL,'$adminId')");
          }
          else{
              $insertImg = mysqli_query($con,"update tblprofilepic set profilePic='$picture' where ID='$adminId'");
          }

           if(!$insertImg){
                $msg = "Failed to upload your profile picture.";
                $css_class = "alert-danger";
            }
            else{
              $msg = "Your profile picture has been uploaded.";
              $css_class = "alert-success";
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
                $msg = "Failed to upload your profile picture.";
                $css_class = "alert-danger";
            }
            else{
              $msg = "Your profile picture has been uploaded.";
              $css_class = "alert-success";
            }
        }
        $uploadOk = 1;
      }


    if (file_exists($target_file)) {
      $uploadOk = 0;
    }
    if ($uploadOk != 0) {
        move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file);
    }
  }


   