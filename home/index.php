<!--This is for the home page after the user has logged in-->
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

$userName = $_SESSION["userName"];
$user = new Users($conn);

$row = $user->getProfileByUserName($userName);
$userId = $row['userId'];
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$image = $row['profilePhoto'];

if(isset($_POST['like']))
{
	$postId = $_POST['like'];
	$like = $user->likes($userId, $postId);

	if(!$like)
		echo "<script type='text/javascript'>alert('Could not like the post');</script>";
	else
		echo "<script type='text/javascript'>window.location.href = 'index.php#".$postId."';</script>";

}
if(isset($_POST['user2']))
{
	$user2=$_POST['user2'];
	$result=$user->follow($userId,$user2);
	if(!$result)
		echo "<script type='text/javascript'>alert('Could not follow the user');</script>";
	else
		echo "<script type='text/javascript'>window.location.href='index.php';</script>";

}

?>
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
			<input type="text" class="form-control" name="q" placeholder="Search for...">
          	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
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
		<img src="<?php echo $image; ?>" class="img-responsive circle photoHolder" alt="Cinque Terre" height="100" width="100">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textHolder center">
			<p class="bold"><?php echo "<a href='profile.php?profile=".$userName."'>@".$userName."</a>"; ?></p>
			<p><?php echo $firstName."  ".$lastName; ?></p>
			<form method="post" action="editProfile.php">

			<input type="hidden" name="userName" value="userName"> 
			<button type="submit" class="btn btn-default">Edit Profile</button>
			</form>
		</div>
	</div>
	</div>
	<div class="profile">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<span class="heading bold"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Most popular</span>
			</div>
			<?php 
			$w = 0 ;
			$mostPopular = $user->getMostPopular();
			while($w < count($mostPopular)-1)
			{
			?>
			<div class="row followingUser">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<img src="<?php echo $mostPopular[$w]['profilePhoto']; ?>" class="image-responsive circle follow" >
				</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<p><span class="postHead"><a href="profile.php?profile=<?php echo $mostPopular[$w]['userName']; ?>"> @<?php echo $mostPopular[$w]['userName']; ?></a></span> </p>
						<p><?php echo $mostPopular[$w]['firstName']." ".$mostPopular[$w]['lastName']; ?></p>
					</div>
									
				</div>
			<?php
			$w = $w+1;
			}?>
		</div>
	</div>
	</div>


<?php

$posts=$user->getPosts($_SESSION['userName']);

$i=0;
if($posts != "something went wrong" && $posts != "Follow Someone" && $posts != "No id found")
{	
	echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content">';
	while ($i < count($posts)-1) {
		
		$profile = $user->getProfileByUserId($posts[$i]['userId']);
		echo ' 
			<div  id = "'.$posts[$i]['postId'].'" class="row repeat">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
					<!--This is the user photo-->';

					echo '<img src="'.$profile["profilePhoto"].'"  width = "80" class="img-responsive circle photoHolder">
					</div>
					<div class="col-xs-7 col-sm-7 col-md-10 col-lg-10">
						<p><span class="postHead"> <a href="profile.php?profile='.$profile["userName"].'">@'.$profile["userName"].'</a></span> posted: 
						</p>  	
						<p class="timeDisplay">On, '.$posts[$i]["createdOn"].'</p>
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

							
							<input type="hidden" name="like" value="'.$posts[$i]['postId'].'">';
							$likeFlag = $user->isLiked($userId, $posts[$i]['postId']);

							
								echo '<button type="submit" class="btn btn-default"><span id = "spanIdLike" class="glyphicon glyphicon-thumbs-';if(!$likeFlag){echo "up";}else{echo "down";} echo '" aria-hidden="true"></span>'; 
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

else if(strcmp($posts, "Follow Someone")  === 0)
{
	echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content alert alert-info">No posts yet!</div>';
}
else if($posts == "No id found" || $posts != "something went wrong" )
{
	echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 content alert alert-danger">Something is not right</div>';
}

?>
		<!-- <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> Unlike</button> -->


	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<div class="profile">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<span class="heading bold"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Now Trending</span><br>
				<?php
					$mostTrending = $user->getTrending();
					$u = 0;
					while($u < count($mostTrending)-1 )
					{
				?>
		<div class="row trending">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p><span class="postHead"><a href="profile.php?profile=<?php echo $mostTrending[$u]['userName']; ?>">@<?php echo $mostTrending[$u]['userName']; ?></a></span>  : <?php echo $mostTrending[$u]['description']; ?></p>
			</div>
		</div>
		<?php $u = $u + 1 ;} ?>
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

		<?php
			$following = $user->getFollowing($_SESSION['userName'],"following");
			$i = 0;
			if($following != "You are not following anyone" && $following != "Something went wrong")
			{
				while($i < count($following)-1)
				{
					$fId = $following[$i]['userId'];
					$fuserName = $following[$i]['userName'];
					$ffirstName = $following[$i]['firstName'];
					$flastName = $following[$i]['lastName'];
					$fprofilePhoto = $following[$i]['profilePhoto'];

		?>
		<!-- This tag needs to be repeated in loop, while posting users. -->

		<div class="row followingUser">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<img src="<?php echo $fprofilePhoto; ?>" class="image-responsive circle">
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<p><span class="postHead"><a href="profile.php?profile=<?php echo $fuserName; ?>">@<?php echo $fuserName; ?></a></span>
				<form method = "post" action = "">
				<input type = "hidden" name = "user2" value = "<?php echo $fId; ?>"/> 
				<button type="submit" class="btn btn-default pull-right"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Unfollow</button></form></p>
				<p> <?php echo $ffirstName; ?> <?php echo $flastName; ?></p></div></div>
				<?php
				$i = $i+1;
				}?>
				
			<?php	
			}
			else if($following == "You are not following anyone")
			{
				echo '<p>You are not following anyone</p>';
			}
			else
			{
				echo '<p>Something went wrong</p>';
			}
		?>
			

		</div>
		
		
	</div>
	</div>
	</div>
</div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{

	
	$description = $_POST["description"];

	$img_name=$_FILES["image"]["name"];
	$img_name = nameOfFile($img_name,substr($img_name,-4),"../images/");
	$temp_name = $_FILES['image']['tmp_name'];
	move_uploaded_file($temp_name, $img_name);


	$userName = $_SESSION["userName"];

	$postFlag = $user->addPost($img_name, $description, $userName);

	if($postFlag === true)
	{
		echo "<script type='text/javascript'>alert('Post successfully added');window.location.href = 'index.php';</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Post not added');window.location.href = 'index.php';</script>";
	}

}

?>
