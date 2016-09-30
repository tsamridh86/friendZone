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
<html>
<head>
	<title><?php echo $postDetails['userName'];?> post</title>
	<!-- links to bootstrap & jQuery -->
	<script src="../js/jquery-3.1.0.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css"> 
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/home.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<img src="<?php echo $postDetails['profilePhoto'];?>" class="img-responsive circle limitHeight">
			</div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<p><span class="postHead"><?php echo $postDetails['userName'];?> </span> posted: </p>
					<p class="timeDisplay"> On, <?php echo $postDetails['createdOn'];?>  </p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
						<img src="<?php echo $postDetails['img'];?>" class="img-responsive photoHolder">
					</div>
				</div>
				<div class="row">
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<p> <?php echo $postDetails["description"];?></p> 
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
			<!-- Delete this after the backend, because this is to show that 2 ppl can comment at the same time -->
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<img  class="img-responsive circle limitHeight" src="../images/1080x1920-HD-wallpapers-samsung-htc-android-smartphone-3040q7mm7-1080P.jpg">
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 well">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<p><span class="postHead">@userName</span> posted: This comment is only here to show how fabulous this thing looks even a dump of people come here & comment some nonsence that they really should not, come guys lol, get a  life.</p>
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