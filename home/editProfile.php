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
			<input type="text" name="firstName" class="form-control" placeholder="First Name">
		</div> 
	</div>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			Last Name : 
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<input type="text" name="lastName" class="form-control" placeholder="Last Name">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			Password : 
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<input type="password" name="password" class="form-control" placeholder="Password">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			Current Profile Photo :
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<img src="../images/wallpaper.jpg" class="img-responsive" width="100">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
			Profile Photo : 
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<input type="file" name="profilePhoto" class="form-control" placeholder="Profile Photo">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-ok okay" aria-hidden="true"></span> Save Changes</button>
		</div>
	</div>
</form>
</div>
</body>
</html>