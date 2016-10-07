<?php
require_once '../config/connect.php';
require_once '../config/classes.php';
session_start();
if(!isset($_SESSION["userName"]))
{
	header('Location:../index.php');
}
if(isset($_GET['logout']))
{
$users = new Users($conn);
$users->logout();
}
if(isset($_POST['user1']) && isset($_POST['user2']))
{
	$user = new Users($conn);
	$user1 = $_POST['user1'];
	$user2 = $_POST['user2'];
	$uName = $_POST['profile'];
	$result = $user->follow($user1, $user2);
	if(!$result)
	{
		echo "<script type='text/javascript'>alert('Could not follow.Try later.');</script>";
	}
	else
	{
		header('refresh:0; location:profile.php?profile='.$uName);
	}

}

if(isset($_POST['like']) && isset($_POST['uId']) && isset($_POST['likeBtn']))
{
	$user = new Users($conn);
	$wId = $_POST['uId'];
	$postId = $_POST['like'];
	$uName = $_POST['profile'];
	$like = $user->likes($wId, $postId);

	if(!$like)
		echo "<script type='text/javascript'>alert('Could not like the post');</script>";
	else
		header('refresh:0; location:profile.php?profile='.$uName);

}

if(isset($_GET['profile']))
{
	$user = new Users($conn);
	$userName=$_GET['profile'];
	$row = $user->getProfileByUserName($userName);
$userId = $row['userId'];
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$image = $row['profilePhoto'];
$posts=$user->getPostsForProfile($_GET['profile']);
$following = $user->getFollowing($_GET['profile'],"following");
$followers = $user->getFollowing($_GET['profile'],"followers");
}
if(!isset($_GET['profile']))
{
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>@<?php echo $userName;?></title>
		<!-- links to bootstrap & jQuery -->
		<script src="../js/jquery-3.1.0.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/home.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/home.css">
		<script>
// 		var el = document.getElementById('deletePostForm');

// el.addEventListener('submit', function(){
//     return confirm('Are you sure you want to submit this form?');
// }, false);
		</script>
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
								<span class="heading bold"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $firstName;?> profile</span>
								<img src="<?php echo $image; ?>" class="img-responsive circle photoHolder" alt="Cinque Terre" height="100" width="100">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textHolder center">
								<p class="bold"><a href="profile.php?profile=<?php echo $userName;?>">@<?php echo $userName;?></a></p>
								<p><?php echo $firstName.' '.$lastName;?></p>
								<?php
									if($userName == $_SESSION['userName'])
									{
								?>
								<form method="post" action="editProfile.php">
								<input type="hidden" name="userName" value="userName"> 
								<button type="submit" class="btn btn-default">Edit Profile</button>
								</form>
								<?php
									}
									else
									{
										$result = $user->getProfileByUserName($_SESSION['userName']);
										$uId = $result['userId'];	
										echo '<form method = "post" action = "">';
										echo '<input type = "hidden" name = "profile" value = "'.$userName.'">';
										echo '<input type = "hidden" name = "user1" value = "'.$uId.'">';
										echo '<input type = "hidden" name = "user2" value = "'.$userId.'">';
										$isFollowing = $user->isFollowing($uId, $userId);
										echo '<button type="submit" class="btn btn-default" name = "followBtn" value = "1"><span class="glyphicon glyphicon-eye-'; if(!$isFollowing){echo 'open';}else{echo 'close';} echo '" aria-hidden="true"></span>'; if(!$isFollowing){echo 'Follow';}else{echo 'Unfollow';} echo '</button></form>';

									}
								?>
							</div>
						</div>
					</div>
					<?php
					$i = 0;
			
					echo '<div class="profile" >
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<span class="heading bold"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span> @'.$userName.' follows</span><br>';
			if($following != "You are not following anyone" && $following != "Something went wrong")
			{
								while($i < count($following)-1){
									$fuserName = $following[$i]['userName'];
									$ffirstName = $following[$i]['firstName'];
									$flastName = $following[$i]['lastName'];
									$fprofilePhoto = $following[$i]['profilePhoto'];

								echo '
								<div class="row followingUser">
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<img src="'.$fprofilePhoto.'" class="image-responsive circle follow" >
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p><span class="postHead"><a href="profile.php?profile='.$fuserName.'"> @'.$fuserName.'</a></span> </p>
										<p> '.$ffirstName.' '.$flastName.'</p>
									</div>
								</div>';
								$i=$i+1;
							}
								
						
					}
			else if($following == "You are not following anyone" && $following !="Something went wrong"){
				echo '<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content alert alert-info">Not following anyone</div>';
			}
			else if($following != "You are not following anyone" && $following =="Something went wrong"){
				echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content alert alert-danger">Something went wrong</div>';
			}

	echo '	</div></div></div>';							
	echo '</div>';				
?>
<?php
$i=0;
if($posts != "No posts found" && $posts != "No id found")
{	
	echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content">';
	while ($i < count($posts)-1) {
		
		
		echo ' 
			<div  id = "'.$posts[$i]['postId'].'" class="row repeat">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
					<!--This is the user photo-->';

					echo '<img src="'.$image.'"  width = "80" class="img-responsive circle photoHolder">
					</div>
					<div class="col-xs-7 col-sm-7 col-md-10 col-lg-10">
						<p><span class="postHead"><a href="profile.php?profile='.$userName.'"> @'.$userName.'</a></span> posted: 
						</p>';
					if($_GET['profile'] == $_SESSION['userName'])
						{
							echo '<form class="navbar-form " method="get" action="editPost.php">
							<input type="hidden" name="post" value="'.$posts[$i]['postId'].'"> 
								<button type="submit" class="btn btn-default pull-right"><span class="glyphicon glyphicon-scissors" aria-hidden="true"></span> Edit</button></form>';
							echo '<form class="navbar-form " id="deletePostForm" method="get" action="editPost.php" onsubmit="return confirm(\'Are you really want to delete the post?\');">
							<input type="hidden" name="deletePostId" value="'.$posts[$i]['postId'].'"> 
								<button type="submit"  class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete</button></form>';

						}  	
						echo '<p class="timeDisplay">On, '.$posts[$i]["createdOn"].'</p>
					</div>
				</div>';

				if($posts[$i]['img'] != NULL){
					echo '<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img src="'.$posts[$i]['img'].'" class="img-responsive photoHolder">
					</div>
				</div>';
			}
				echo '<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p> '.$posts[$i]["description"].'</p> 
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
						<form method="post" action="">

							<input type = "hidden" name = "profile" value = "'.$userName.'">

							<input type="hidden" name="like" value="'.$posts[$i]['postId'].'">';
							$result = $user->getProfileByUserName($_SESSION['userName']);
							$wId = $result['userId'];
							$likeFlag = $user->isLiked($wId, $posts[$i]['postId']);
							echo '<input type = "hidden" name = "uId" value = "'.$wId.'">';
							
								echo '<button type="submit" class="btn btn-default" name = "likeBtn" value = "2"><span id = "spanIdLike" class="glyphicon glyphicon-thumbs-';if(!$likeFlag){echo "up";}else{echo "down";} echo '" aria-hidden="true"></span>'; 
								if(!$likeFlag)
									echo "Like <span class=\"badge\">".$user->getNoOfLikes($posts[$i]['postId'])."</span>";
								else
									echo "Unlike <span class=\"badge\">".$user->getNoOfLikes($posts[$i]['postId'])."</span>";
								echo '</button>
							
							
							
						</form>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">

						<form method="post" action="post.php">
							<input type="hidden" name="comment" value="'.$posts[$i]['postId'].'">
							<button type="submit" name="commentButton" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment <span class = "badge" >'.$user->getNoOfComments($posts[$i]['postId']).'</span></button>
						</form>
					</div>
				</div>
				</div>
			</div>
			';
			$i = $i+1;
	}
echo '</div>';
}
else if($posts === "No id found" )
{

	echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content alert alert-danger">Something is not right</div>';
}
else if(strcmp($posts, "No posts found")  === 0)
{
	echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content alert alert-info">No posts found</div>';
}

?>

							

<!-- <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> Unlike</button> -->
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
<?php
					echo '<div class="profile" >
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<span class="heading bold"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> @'.$userName.' followed by</span><br>';
			$i=0;
			if($followers != "You are not following anyone" && $followers != "Something went wrong")
			{
								while($i < count($followers)-1){
									$fuserName = $followers[$i]['userName'];
									$ffirstName = $followers[$i]['firstName'];
									$flastName = $followers[$i]['lastName'];
									$fprofilePhoto = $followers[$i]['profilePhoto'];

								echo '
								<div class="row followingUser">
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<img src="'.$fprofilePhoto.'" class="image-responsive circle follow" >
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p><span class="postHead"><a href="profile.php?profile='.$fuserName.'"> @'.$fuserName.'</a></span> </p>
										<p> '.$ffirstName.' '.$flastName.'</p>
									</div>
								</div>';
								$i=$i+1;
							}
								
						
					}
			else if($followers == "You are not following anyone" && $followers !="Something went wrong"){
				echo '<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content alert alert-info">No followers</div>';
			}
			else if($following != "You are not following anyone" && $followers =="Something went wrong"){
				echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content alert alert-danger">Something went wrong</div>';
			}

	echo '	</div></div></div>';							
	echo '</div>';				
?>
</div>
</div>
</div>
</body>
</html>