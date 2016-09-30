<?php
require_once '../config/connect.php';
require_once '../config/classes.php';
session_start();
if(!isset($_SESSION["userName"]) || !isset($_POST['commentButton']))
{
	header('Location:../index.php');
}
if(isset($_GET['logout']))
{
$user = new Users($conn);
$user->logout();
}
if(isset($_POST['commentButton']) && isset($_POST['comment']))
{
$user = new Users($conn);
$postId=$_POST['comment'];
	$postDetails=$user->getUserAndPostByPostId($postId);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $postDetails['userName'];?>'s post</title>
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
					<input type="text" class="form-control" placeholder="Search for...">
					<button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out</a></li>
				</ul>
			</div>
		</nav>
		<div class="container commentContainer">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<img src="<?php echo $postDetails['profilePhoto'];?>" class="img-responsive circle limitHeight">
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-md-3 col-lg-3">
							<p><span class="postHead">@<?php echo $postDetails['userName'];?></span> posted: </p>
							<p class="timeDisplay"> On, <?php echo $postDetails['createdOn'];?> </p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
							<img src="<?php echo $postDetails['img'];?>" class="img-responsive photoHolder limitHeight-300">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
							<p class="textHolder"> <?php echo $postDetails["description"];?></p>
						</div>
					</div>
					<div class="row likeHolder">
						<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
							<form method="post" action="">
								<input type="hidden" name="like" value="postId">
								<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Like <span class="badge">4</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- This is the div that needs to be put in loop for the commenter -->
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<img  class="img-responsive circle limitHeight" src="../images/1080x1920-HD-wallpapers-samsung-htc-android-smartphone-3040q7mm7-1080P.jpg">
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 well">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<p><span class="postHead">@userName</span> posted: Lol this pic sux</p>
							<p class="timeDisplay"> On, 16th Dec 1991 </p>
						</div>
					</div>
				</div>
			</div>
		<!-- This div should show up at the last because this is the last comment made -->
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<!-- THe current user photo should be here -->
				<img  class="img-responsive circle limitHeight" src="../images/1080x1920-HD-wallpapers-samsung-htc-android-smartphone-3040q7mm7-1080P.jpg">
			</div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 well">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form method="post" action="">
							<textarea class="form-control" placeholder="Write a comment..."></textarea>
							<button type="button" class="btn btn-default gap"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment</button>
						</form>
						<p class="timeDisplay"> On, 16th Dec 1991 </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>