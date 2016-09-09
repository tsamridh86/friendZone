<?php
include_once 'connect.php';
include_once 'classes.php';
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
		<h3> <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Join Us! </h3>
	</div>
	<div class="modal-body">
	<div class="row">
		<form action="" method="POST" role="form">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<input type="text" name="firstName" class="form-control" required="required" placeholder="First Name">
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<input type="text" name="lastName" class="form-control" required="required" placeholder="Last Name">
		</div>
	</div>
		<input type="text" name="userName">
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<div class="modal-footer">
		<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> 8758624706 </p>
		<p><span class="glyphicon glyphicon-glyphicon glyphicon-envelope" aria-hidden="true"></span> t.samridh.86@gmail.com</p>
		<p><span class="glyphicon glyphicon-glyphicon glyphicon-home" aria-hidden="true"></span> H-13, S.V.National Institute Of Technology, Surat</p>
	</div>
	</div>
	</div>
</div>

</body>
</html>
<?php
$user = new Users($conn);
?>