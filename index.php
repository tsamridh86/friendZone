<?php
require_once 'config/connect.php';
require_once 'config/classes.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Friend Zone !</title>

	<!-- links to bootstrap & jQuery -->
	<script src="js/jquery-3.1.0.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css"> 
	<script src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
<nav class="navbar" >
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Friend Zone</a>
		</div>
			<ul class="nav navbar-nav">
				<li class="active"><a><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login" data-toggle="modal" data-target="#signUpWindow"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign Up</a></li>
				<li><a href="contact" data-toggle="modal" data-target="#popUpWindow"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contact Us</a></li>
			</ul>
	</div>
</nav>
<div class="modal fade" id="popUpWindow">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">x</button>
		<h3> <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contact administrator </h3>
	</div>
	<div class="modal-body">
		<p>Trust me, I'm an engineer.</p>
		<p>Feel free to contact me.</p>
	</div>
	<div class="modal-footer">
		<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> 8758624706 </p>
		<p><span class="glyphicon glyphicon-glyphicon glyphicon-envelope" aria-hidden="true"></span> t.samridh.86@gmail.com</p>
		<p><span class="glyphicon glyphicon-glyphicon glyphicon-home" aria-hidden="true"></span> H-13, S.V.National Institute Of Technology, Surat</p>
	</div>
	</div>
	</div>
</div>
<div class="modal fade" id="signUpWindow">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">x</button>
		<h3> <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Join Us! </h3>
	</div>
	<div class="modal-body">
		<form action="" method="POST">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<input type="text" name="firstName" class="form-control" required="required" placeholder="First Name">
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<input type="text" name="lastName" class="form-control" required="required" placeholder="Last Name">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="text" name="userName" class="form-control" required="required" placeholder="User Name">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="password" name="password" class="form-control" required="required" placeholder="Password">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<input type="file" name="profilePic" class="form-control" required="required" placeholder="Profile Photo">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<button type="submit" class="btn btn-primary">Sign Up</button>
		</div>
	</div>
	</form>
	</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="main col-xs-12 col-sm-12 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4 ">
		<form action="" method="POST" role="form">
			<legend><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Login</legend>
			<input type="text" name="userName" class="form-control" required="required" placeholder="User Name">
			<input type="password" name="password" class="form-control" required="required" placeholder="Password">
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
</body>
</html>
<?php
$user = new Users($conn);
?>