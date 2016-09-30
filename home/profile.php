
<!--This is for the profile page tailored for each user-->
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>

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
			<li><a data-toggle="modal" data-target="#followingWindow"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Following </a></li>
		</ul>
		<form class="navbar-form navbar-left" method="get" action="search.php">
			<input type="text" class="form-control" placeholder="Search for...">
          	<button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </form>
		<ul class="nav navbar-nav navbar-right">

			<li><a href="#" data-toggle="modal" data-target="#writeWindow"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Write a Post</a></li>
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
		<span class="heading bold"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Your profile</span>
		<img src="../images/Wallpaper.jpg" class="img-responsive circle photoHolder" alt="Cinque Terre" height="100" width="100">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textHolder center">
			<p class="bold">@tsamridh86</p>
			<p>Samridh  Tuladhar</p>
			<form method="post" action="editProfile.php">

			<input type="hidden" name="userName" value="userName"> 
			<button type="submit" class="btn btn-default">Edit Profile</button>
			</form>
		</div>
	</div>
	</div>
	</div>


<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content"> 
			<div class="row repeat">
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
							<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Like <span class="badge">4</span></button>
						</form>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
						<form method="post" action="">
							<input type="hidden" name="comment" value="postId">
							<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment <span class="badge">4</span></button>
						</form>
					</div>
				</div>
				</div>
			</div>
			 
			<div class="row repeat">
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
							<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Like <span class="badge">4</span></button>
						</form>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
						<form method="post" action="">
							<input type="hidden" name="comment" value="postId">
							<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment <span class="badge">4</span></button>
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
		<span class="heading bold"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Now Trending</span><br>
		<div class="row trending">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p><span class="postHead">@userName</span>  : we will show the top 3 most liked posts here, this is the most trending place. select post from table having max(like) or some query like that </p>
			</div>
		</div>
		<div class="row trending">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p><span class="postHead">@userName</span> : Description of the post. This post could be arbitarily long so I am writing something random here to test it outside lol. </p>
			</div>
		</div>
		<div class="row trending">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p><span class="postHead">@userName</span> : This div needs to be created with for loop. This is made to show that the text auto-aligns itself in the middle. </p>
			</div>
		</div>
		</div>
	</div>
	</div>
	</div>
</div>
</div>
<div class="modal fade" id="writeWindow">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">x</button>
		<h3> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Write a Post</h3>
	</div>
	<div class="modal-body">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			
			<div class="row postWrite">
				<div class="col-xs-5 col-sm-5 col-md-4 col-lg-4 postHead">
					<span class="glyphicon glyphicon-list" aria-hidden="true"></span>  Description :
				</div>
				<div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
					<textarea name="description" class="form-control" rows="2" required="required"></textarea>
				</div>
			</div>
			<div class="row postWrite">
				<div class="col-xs-5 col-sm-5 col-md-4 col-lg-4 postHead">
					<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>  Add a photo :
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<input type="file" name="image">
				</div> 
			</div>
			<div class="row postWrite">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<button type="submit" class="btn btn-default" name="submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Post</button>
				</div>
			</div>
		
		</form>
	</div>
	</div>
	</div>
</div>
<div class="modal fade" id="followingWindow">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">x</button>
		<h3> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> People you are following :</h3>
	</div>
	<div class="modal-body">
		<!-- This tag needs to be repeated in loop, while posting users. -->
		<div class="row followingUser">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<img src="../images/Wallpaper.jpg" class="image-responsive circle">
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<p><span class="postHead"> @userName</span> <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Unfollow</button></p>
			</div>
		</div>
		<!-- Can be deleted tag to tag only -->
		<div class="row followingUser">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<img src="../images/Wallpaper.jpg" class="image-responsive circle">
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<p><span class="postHead"> @userName</span> <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Unfollow</button></p>
			</div>
		</div>
		<!-- Can be deleted tag to tag only -->
		<div class="row followingUser">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<img src="../images/Wallpaper.jpg" class="image-responsive circle">
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<p><span class="postHead"> @userName</span> <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Unfollow</button></p>
			</div>
		</div>
	</div>
	</div>
	</div>
</div>
</body>
</html>

