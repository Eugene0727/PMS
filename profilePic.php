<?php include("processForm.php")?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
	<title></title>
	<style type="text/css">
		.form-div{
	margin-top: 100px;
	border: 1px solid #e0e0e0;
	padding-top: 15px;
}
#profileDisplay{
	display: block;
	width: 60%;
	margin: 10px auto;
	border-radius: 50%;

}
.img-placeholder {
  width: 60%;
  color: white;
  height: 100%;
  background: black;
  opacity: .7;
  height: 210px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
}
.img-placeholder h4 {
  margin-top: 40%;
  color: white;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-4 offset-md-4 form-div">
				<form action="profilePic.php" method="post" enctype="multipart/form-data">

					<h3 class="text-center">Update Profile</h3>

					<?php if(!empty($msg)){ ?>
						<div class="alert <?php echo $css_class; ?>">
							<?php echo $msg;?>
						</div>
					<?php } ?>
					<div class="form-group text-center">
						 <span class="img-div">
              <div class="text-center img-placeholder"  onclick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="images/placeholder.png" onclick="triggerClick()" id="profileDisplay">
            </span>
						<!-- <img src="images/placeholder.png" onclick="triggerClick()" id="profileDisplay">
						<label for="profileImage">Profile Image</label> -->
						<input type="file" name="profileImage" id="profileImage" style="display: none">
					</div>
					<div class="form-group">
						<button type="submit" name="save-user" class="btn btn-primary btn-block">Save Profile</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function triggerClick(e) {
  			document.getElementById('profileImage').click();
		}
		let profile = document.getElementById('profileImage');
		let img = document.getElementById('profileDisplay');

		profile.addEventListener("change", function(){
			let file = this.files[0];
			
			if(file){
				let reader = new FileReader();

				reader.addEventListener("load",function(){
					console.log(this);
					img.setAttribute("src",this.result);
				});

				reader.readAsDataURL(file);
			}
		});
	</script>
</body>
</html>