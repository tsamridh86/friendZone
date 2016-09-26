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
			<ul class="nav navbar-nav navbar-right">
				<li><a href="" data-toggle="modal" data-target="#signUpWindow"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign Up</a></li>
				<li><a href="" data-toggle="modal" data-target="#loginWindow"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Login</a></li>
			</ul>
	</div>
</nav>
<div class="modal fade" id="loginWindow">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">x</button>
		<h3> <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Login</h3>
	</div>
	<div class="modal-body">
		<form action="" method="POST" role="form">
			<input type="text" name="userName" class="form-control" required="required" placeholder="User Name">
			<input type="password" name="password" class="form-control" required="required" placeholder="Password">
			<button type="submit" class="btn btn-primary" name="login">Submit</button>
		</form>
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
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
		</div>
	</div>
	</form>
	</div>
	</div>
	</div>
</div>
</body>
</html>
<?php
$user = new Users($conn);
if(isset($_POST['signup']))
{
$userName=$_POST["userName"];
$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$password=$_POST["password"];
$isSignup = $user->isSignup($firstName,$lastName,$userName,$password);
if($isSignup === true)
{
	echo "<script type='text/javascript'>alert('Successfully Signed Up');window.location.href = 'index.php';</script>";
}
elseif ($isSignup == "Username already exists") {
	echo "<script type='text/javascript'>alert('Username already exists');window.location.href = 'index.php';</script>";	
}
else{
		echo "<script type='text/javascript'>alert('Something went wrong');window.location.href = 'index.php';</script>";
}
}
if(isset($_POST['login']))
{
	$userName=$_POST["userName"];
	$password=$_POST["password"];
	$isLogin = $user->isLogin($userName,$password);
	if($isLogin === true)
	{
		header('location:/home/index.php');
	}
	else
	{
		echo "<script type='text/javascript'>alert('Wrong user Credentials');window.location.href = 'index.php';</script>";
	}
}
?>