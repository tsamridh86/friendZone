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
if(isset($_POST['searchButton']) && isset($_POST['search']))
{
	$searchQuery=$_POST['search'];
	$user = new Users($conn);
	$searchedUsersList=$user->searchUsers($searchQuery);
	
}
else if(isset($_POST['searchButton']) || !isset($_POST['search']))
{
header('Location:index.php');
}

$user = new Users($conn);
$userName = $_SESSION["userName"];
$row = $user->getProfileByUserName($userName);
$userId = $row['userId'];

if(isset($_POST['user1']) && isset($_POST['user2']))
{
	$user1 = $_POST['user1'];
	$user2 = $_POST['user2'];
	$searchQuery = $_POST['searchB'];

	$result = $user->follow($user1, $user2);
	if(!$result)
	{
		echo "<script type='text/javascript'>alert('Could not follow.Try later.');</script>";
	}
	else
	{
		header('refresh:0; location:search.php?q='.$searchQuery);
	}
}
?>

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
					<form class="navbar-form navbar-left" method="post" action="search.php">
						<input type="text" class="form-control" placeholder="Search for..." name="search">
						<button type="submit" class="btn btn-default" name="searchButton"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
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
			<?php if($searchedUsersList === "No records found"){
					echo '<div class="alert alert-info">No records found</div>';
				}
				if($searchedUsersList === "Something went wrong"){
					echo '<div class="alert alert-danger">Something went wrong</div>';
					}
				else{
					$i=0;
					echo '<div class="container"><div class="row">';
						while ($i < count($searchedUsersList) - 1) {
							
						echo '
							<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
								<img src="'.$searchedUsersList[$i]['profilePhoto'].'" class="photoHolder">
								<p><a> @'.$searchedUsersList[$i]['userName'].' </a></p>
								<p>'.$searchedUsersList[$i]['firstName'].' '.$searchedUsersList[$i]['lastName'].'</p>
								<form method = "post" action = "">
								<input type = "hidden" name = "user1" value = "'.$userId.'">
								<input type = "hidden" name = "searchB" value = "'.$searchQuery.'">
								<input type = "hidden" name = "user2" value = "'.$searchedUsersList[$i]['userId'].'">';
								$isFollowing = $user->isFollowing($userId, $searchedUsersList[$i]['userId']);


								echo '<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-eye-'; if(!$isFollowing){echo 'open';}else{echo 'close';} echo '" aria-hidden="true"></span>'; if(!$isFollowing){echo 'Follow';}else{echo 'Unfollow';} echo '</button>
								</form>
							</div>';
					$i=$i+1;
				}
				echo '		
						</div>
					</div>';
			}?>
<!-- 			<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 repeat">
								<img src="../images/default.png" class="photoHolder">
								<p><a> @userName </a></p>
								<p> firstName lastName </p>
								<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Unfollow</button>
							</div> -->
		</div>
	</body>
</html>