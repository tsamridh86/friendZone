<?php
require_once '../config/connect.php';
require_once '../config/classes.php';
session_start();
if(!isset($_SESSION["userName"]))
{
	header('Location:../index.php');
}
if(isset($_GET['logout']))
{
$users = new Users($conn);
$users->logout();
}

$userName = $_SESSION["userName"];
$user = new Users($conn);

$row = $user->getProfileByUserName($userName);
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$password = $row['password'];
$image = $row['profilePhoto'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit your profile</title>
	<!-- links to bootstrap & jQuery -->
	<script src="../js/jquery-3.1.0.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css"> 
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/editProfile.css">
	<script type="text/javascript">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</head>
<body>
<div class="container-fluid">
	
<div class="row">
	<div class="col-xs-9 col-sm-9 col-md-3 col-lg-3">
		<h3 class="heading"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Edit Profile </h3>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 pull-right exit">
			<a href="index.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</a>
		</div>
	</div>
</div>
<hr>
</div>
<div class="container-fluid editor">
	<form method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			First Name :
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<input type="text" name="firstName" value="<?php echo $firstName; ?>" class="form-control" placeholder="First Name">
		</div> 
	</div>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			Last Name : 
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<input type="text" name="lastName" value="<?php echo $lastName; ?>" class="form-control" placeholder="Last Name">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			Password : 
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<input type="password" name="password" class="form-control" placeholder="Enter new Password">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			Current Profile Photo :
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<img id="preview" src="<?php echo $image; ?>" class="img-responsive" width="100">

		</div>
	</div>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			Profile Photo : 
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<input type="file" name="profilePhoto" class="form-control" placeholder="Profile Photo" onchange="readURL(this);">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok okay" aria-hidden="true"></span> Save Changes</button>
		</div>
	</div>
</form>
</div>
</body>
</html>

<?php


$user = new Users($conn);
if(isset($_POST["firstName"]))
{
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$password1 = $_POST["password"];

	if(empty($password1))
		$password1 = $password;

	if(!is_uploaded_file($_FILES["profilePhoto"]["tmp_name"]))
	{
		$img_name = $image;
	}
	else
	{
		$img_name=$_FILES["profilePhoto"]["name"];
		$img_name = nameOfFile($img_name,substr($img_name,-4),"../images/");
		$temp_name = $_FILES['profilePhoto']['tmp_name'];
		move_uploaded_file($temp_name, $img_name);
	}


	$profile = $user->editProfile($firstName, $lastName, $userName, $password1, $img_name);

	if($profile === true)
	{
		echo "<script type='text/javascript'>alert('Profile Updated.');window.location.href = 'index.php';</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Problem updating profile.');window.location.href = 'editProfile.php';</script>";
	}
}
?>