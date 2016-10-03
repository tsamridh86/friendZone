<!DOCTYPE html>
<html>
	<head>
		<!-- the search title can be displayed at the top here -->
		<title>Results for Search title</title>
		<script src="../js/jquery-3.1.0.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		<script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/search.css">
	</head>
	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-fixed-top coloring" >
				<div class="navbar-header">
					<a class="navbar-brand" href="#" onclick="#profile">Friend Zone</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#openNav" aria-expanded="false" id="expansion"><span id="targetArea" aria-hidden="true"></span></button>
				</div>
				<div class="container-fluid collapse navbar-collapse" id="openNav">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
					</ul>
					<form class="navbar-form navbar-left" method="get" action="search.php">
						<input type="text" class="form-control" placeholder="Search for...">
						<button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php?logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out</a></li>
					</ul>
				</div>
			</nav>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 shiftDown">
					<h3 class="heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Relevant Users </h3>
				</div>
			</div>
			<hr>
			<div class="container">
				
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
						<img src="../images/Wallpaper.jpg" class="photoHolder">
						<p><a> @userName </a></p>
						<p> firstName lastName </p>
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Follow</button>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
						<img src="../images/b1.jpg" class="photoHolder">
						<p><a> @userName </a></p>
						<p> firstName lastName </p>
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Follow</button>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
						<img src="../images/4.jpg" class="photoHolder">
						<p><a> @userName </a></p>
						<p> firstName lastName </p>
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Unfollow</button>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
						<img src="../images/default.png" class="photoHolder">
						<p><a> @userName </a></p>
						<p> firstName lastName </p>
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Unfollow</button>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
						<img src="../images/1080x1920-HD-wallpapers-samsung-htc-android-smartphone-3040q7mm7-1080P.jpg" class="photoHolder">
						<p><a> @userName </a></p>
						<p> firstName lastName </p>
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Follow</button>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
						<img src="../images/Wallpaper.jpg" class="photoHolder">
						<p><a> @userName </a></p>
						<p> firstName lastName </p>
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Follow</button>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
						<img src="../images/Wallpaper.jpg" class="photoHolder">
						<p><a> @userName </a></p>
						<p> firstName lastName </p>
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Unfollow</button>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>