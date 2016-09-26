<!DOCTYPE html>
<html>
	<head>
		<title>Write a Post</title>
		<!-- links to bootstrap & jQuery -->
		<script src="../js/jquery-3.1.0.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		<script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>
	<body>
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 upper">
				<span class="heading"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Write a Post</span>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 pull-right upper">
				<button type="button" class="btn btn-default"><a href="index.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel </a></button>
			</div>
		</div>
		<hr>
		<div class="container-fluid ">
			<div class="row postWrite">
				<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 postHead">
					<span class="glyphicon glyphicon-list" aria-hidden="true"></span>  Description :
				</div>
				<div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
					<textarea name="description" class="form-control" rows="2" required="required"></textarea>
				</div>
			</div>
			<div class="row postWrite">
				<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2 postHead">
					<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>  Add a photo :
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<input type="file" name="image">
				</div>
			</div>
			<div class="row postWrite">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Post</button>
				</div>
			</div>
		</div>
	</body>
</html>