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

$users = new Users($conn);

if(isset($_GET['deletePostId']))
{
	$deletePost=$users->deletePost($_GET['deletePostId']);
	if($deletePost === true)
	{
		echo "<script type='text/javascript'>alert('Succesfully deleted Post');window.location.href = 'profile.php?profile=".$_SESSION['userName']."';</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Sorry Something went wrong');window.location.href = 'profile.php?profile=".$_SESSION['userName']."';</script>";
	}
}

if(isset($_GET['post']))
{

	$postId = $_GET['post'];
	$post = $users->getUserAndPostByPostId($postId);

	$image = $post['img'];
	$description = $post['description'];
	$userName = $post['userName'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Post</title>
		<script src="../js/jquery-3.1.0.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/home.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/home.css">
		<link rel="stylesheet" type="text/css" href="../css/editProfile.css">
			<script type="text/javascript">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
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
					<input type="text" class="form-control" placeholder="Search for...">
					<button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container-fluid postEditor editor">
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-3 col-lg-3">
					<h3 class="heading"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Edit Post </h3>
				</div>
			</div>
			<hr>
			
			<form method="post" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
						Current Photo :
					</div>
					<div class="col-xs-7 col-sm-7 col-md-10 col-lg-10">
						
						<img id="preview" src="<?php echo $image; ?>" alt = "No image to display" class="img-responsive" width="350px">
						
						<input type = "hidden" name = "old" value = "<?php echo $image; ?>"/>
						<input type = "hidden" name = "postId" value = "<?php echo $postId; ?>"/>
						<input type = "hidden" name = "uName" value = "<?php echo $userName; ?>"/>

					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
						New Photo :
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<input type="file" name="img" class="form-control" placeholder="Profile Photo" onchange="readURL(this);">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 desc">
						Description :
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<textarea class="form-control" name="description" placeholder="Description"><?php echo $description; ?> </textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok okay" aria-hidden="true"></span> Save Changes</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
<?php
}


if(isset($_POST['description']))
{
	$description = $_POST['description'];
	$old = $_POST['old'];
	$postId = $_POST['postId'];
	$userName = $_POST['uName'];
	if(!is_uploaded_file($_FILES["img"]["tmp_name"]))
	{
		$image = $old;
	}
	else
	{
		$img_name=$_FILES["img"]["name"];
		$img_name = nameOfFile($img_name,substr($img_name,-4),"../images/");
		$temp_name = $_FILES['img']['tmp_name'];
		move_uploaded_file($temp_name, $img_name);
		$image = $img_name;

	}

	$post = $users->editPost($image, $description, $postId);

	if($post === true)
	{
		echo "<script type='text/javascript'>alert('Post Updated.');window.location.href = 'profile.php?profile=".$userName."';</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Problem updating post.');window.location.href = 'editPost.php?post=".$postId."';</script>";
	}

}


?>