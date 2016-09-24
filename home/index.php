<!--This is for the home page after the user has logged in-->
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>

	<!-- links to bootstrap & jQuery -->
	<script src="../js/jquery-3.1.0.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href=".../css/bootstrap-theme.min.css"> 
	<script src="../js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
<nav class="navbar" >
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Friend Zone</a>
		</div>
			<ul class="nav navbar-nav">
				<li class="active"><a><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
				<li><a><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Following </a></li>
			</ul>
			<form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search for...">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Write a Post</a></li>
				<li><a href="logout"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Log Out</a></li>
			</ul>
	</div>
</nav>
<div class="container-fluid">
	
<div class="row outer">
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	<div class="profile">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<span class="heading bold"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Your profile</span>
		<img src="../images/Wallpaper.jpg" class="img-responsive photoHolder" alt="Cinque Terre" height="100" width="100">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textHolder">
			<p class="bold"> userName </p>
			<p> firstName lastName</p>
			<form method="post" action="editPage.php">
			<input type="hidden" name="userName" value="userName"> 
			<button type="button" class="btn btn-default">Edit Profile</button>
			</form>
		</div>
	</div>
	</div>
	<div class="profile">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<span class="heading bold"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Now Trending</span><br>
		posts
		</div>
	</div>
	</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-8 col-lg-offset-1 col-lg-8 content"> 
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 repeat">
				test	
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 repeat">
				test	
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
