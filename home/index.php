<!--This is for the home page after the user has logged in-->
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
<nav class="navbar" >
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Friend Zone</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#openNav" aria-expanded="false" id="expansion"><span id="targetArea" aria-hidden="true"></span></button>
		</div>
	<div class="container-fluid collapse navbar-collapse" id="openNav">
			<ul class="nav navbar-nav">
				<li class="active"><a><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
				<li><a><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Following </a></li>
			</ul>
			<form class="navbar-form navbar-left test">
        <div class="form-group test">
          <input type="text" class="form-control test" placeholder="Search for..."><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </div>
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
		<img src="../images/Wallpaper.jpg" class="img-responsive circle photoHolder" alt="Cinque Terre" height="100" width="100">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textHolder">
			<p class="bold"> @userName </p>
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
	<div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-8 col-lg-offset-1 col-lg-8 content"> 
		<div class="row repeat"><!-- This the div that should be inside the loop when printing all posts-->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
				<img src="../images/Wallpaper.jpg"  width = "80" class="img-responsive circle photoHolder">
				</div>
				<div class="col-xs-7 col-sm-7 col-md-10 col-lg-10">
					<p><span class="postHead">@userName</span> posted: </p>  	
					<p class="timeDisplay"> On, 16th Dec 1991 </p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<img src="../images/postTest.jpg" class="img-responsive photoHolder">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p> Description of the post. This post could be arbitarily long so I am writing something random here to test it outside lol.</p> 
				</div>
			</div>
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<form method="post" action="">
						<input type="hidden" name="like" value="postId">
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Like</button>
					</form>
				</div>
				<div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<form method="post" action="">
						<input type="hidden" name="comment" value="postId">
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment</button>
					</form>
				</div>
			</div>
			</div>
		</div>
		<div class="row repeat"><!--Delete this after making backend, this should come inside a loop-->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
				<img src="../images/Wallpaper.jpg"  width = "80" class="img-responsive circle photoHolder">
				</div>
				<div class="col-xs-7 col-sm-7 col-md-10 col-lg-10">
					<p><span class="postHead">@userName</span> posted: </p>  	
					<p class="timeDisplay"> On, 16th Dec 1991 </p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<img src="../images/testImage.jpe" class="img-responsive photoHolder">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p> This div needs to be created with for loop. This is made to show that the image auto-aligns itself in the middle & i specially made a unlike button if some users want to unlike what they did.</p> 
				</div>
			</div>
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<form method="post" action="">
						<input type="hidden" name="like" value="postId">
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> Unlike</button>
					</form>
				</div>
				<div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<form method="post" action="">
						<input type="hidden" name="comment" value="postId">
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment</button>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
