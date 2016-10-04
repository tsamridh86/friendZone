<!--This page is tailored for individual users -->
<!DOCTYPE html>
<html>
	<head>
		<title>@userName</title>
		<!-- links to bootstrap & jQuery -->
		<script src="../js/jquery-3.1.0.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/home.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/home.css">
		
	</head>
	<body>
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
					<input type="text" class="form-control" name="q" placeholder="Search for...">
					<button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out</a></li>
				</ul>
			</div>
		</nav>
		<div class="container-fluid">
			<div class="row outer">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="profile" id="profile">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<span class="heading bold"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> firstName's profile</span>
								<img src="../images/Wallpaper.jpg" class="img-responsive circle photoHolder" alt="Cinque Terre" height="100" width="100">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textHolder center">
								<p class="bold">@userName</p>
								<p>firstName  lastName</p>
							</div>
						</div>
					</div>
					<div class="profile" >
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<span class="heading bold"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span> @userName follows</span><br>
								<div class="row followingUser">
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<img src="../images/Wallpaper.jpg" class="image-responsive circle follow" >
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p><span class="postHead"> @userName</span> </p>
										<p> firstName lastName</p>
									</div>
								</div>
								<!-- can be deleted after backend -->
								<div class="row followingUser">
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<img src="../images/Wallpaper.jpg" class="image-responsive circle follow" >
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p><span class="postHead"> @userName</span> </p>
										<p> firstName lastName</p>
									</div>
								</div>
								<!-- can be deleted after backend -->
								<div class="row followingUser">
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<img src="../images/Wallpaper.jpg" class="image-responsive circle follow" >
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p><span class="postHead"> @userName</span> </p>
										<p> firstName lastName</p>
									</div>
								</div>
							</div>
						</div></div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content">
						<div  id = "3" class="row repeat">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
								<div class="row">
									<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
										<!--This is the user photo--><img src="../images/Wallpaper.jpg"  width = "80" class="img-responsive circle photoHolder">
									</div>
									<div class="col-xs-7 col-sm-7 col-md-10 col-lg-10">
										<p><span class="postHead"> @tsamridh86</span> posted:
										<button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-scissors" aria-hidden="true"></span> Edit</button>
									</p>
									<p class="timeDisplay">On, 2016-10-01 00:38:55</p>
								</div>
							</div><div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<p> hello there, I am samridh tuladhar here</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
								<form method="post" action="">
									<input type="hidden" name="like" value="postId">
									<input type="hidden" name="like" value="3"><button type="submit" class="btn btn-default"><span id = "spanIdLike" class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>Unlike <span class="badge">1</span></button>
									
									
									
								</form>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
								<form method="post" action="post.php">
									<input type="hidden" name="comment" value="3">
									<button type="submit" name="commentButton" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div  id = "1" class="row repeat">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<div class="row">
							<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
								<!--This is the user photo--><img src="../images/Wallpaper.jpg"  width = "80" class="img-responsive circle photoHolder">
							</div>
							<div class="col-xs-7 col-sm-7 col-md-10 col-lg-10">
								<p><span class="postHead"> @tsamridh86</span> posted:
								<button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-scissors" aria-hidden="true"></span> Edit</button>
							</p>
							<p class="timeDisplay">On, 2016-09-30 00:00:00</p>
						</div>
					</div><div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img src="../images/" class="img-responsive photoHolder">
					</div>
				</div><div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p> What came first? The chicken or the egg?
					Ans : The one you ordered first.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
					<form method="post" action="">
						<input type="hidden" name="like" value="postId">
						<input type="hidden" name="like" value="1"><button type="submit" class="btn btn-default"><span id = "spanIdLike" class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>Unlike <span class="badge">3</span></button>
						
						
						
					</form>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
					<form method="post" action="post.php">
						<input type="hidden" name="comment" value="1">
						<button type="submit" name="commentButton" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div  id = "2" class="row repeat">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
					<!--This is the user photo--><img src="../images/Wallpaper.jpg"  width = "80" class="img-responsive circle photoHolder">
				</div>
				<div class="col-xs-7 col-sm-7 col-md-10 col-lg-10">
					<p><span class="postHead"> @tsamridh86</span> posted:
					<button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-scissors" aria-hidden="true"></span> Edit</button>
				</p>
				<p class="timeDisplay">On, 2016-09-30 00:00:00</p>
			</div>
		</div><div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p> My heart goes shalala in the morning</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
			<form method="post" action="">
				<input type="hidden" name="like" value="postId">
				<input type="hidden" name="like" value="2"><button type="submit" class="btn btn-default"><span id = "spanIdLike" class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>Like <span class="badge">0</span></button>
			</form>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
			<form method="post" action="post.php">
				<input type="hidden" name="comment" value="2">
				<button type="submit" name="commentButton" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment</button>
			</form>
		</div>
	</div>
</div>
</div>
</div>		<!-- <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> Unlike</button> -->
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<div class="profile">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<span class="heading bold"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> @userName followed by </span><br>
			<div class="row followingUser">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<img src="../images/Wallpaper.jpg" class="image-responsive circle follow" >
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<p><span class="postHead"> @userName</span> </p>
					<p> firstName lastName</p>
				</div>
			</div>
			<!-- can be deleted after backend -->
			<div class="row followingUser">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<img src="../images/Wallpaper.jpg" class="image-responsive circle follow" >
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<p><span class="postHead"> @userName</span> </p>
					<p> firstName lastName</p>
				</div>
			</div>
			<!-- can be deleted after backend -->
			<div class="row followingUser">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<img src="../images/Wallpaper.jpg" class="image-responsive circle follow" >
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<p><span class="postHead"> @userName</span> </p>
					<p> firstName lastName</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</body>
</html>