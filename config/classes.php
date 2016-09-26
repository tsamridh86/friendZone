<?php
class Users{
	public function __construct($conn)
	{
		$this->conn = $conn;
	}
	
	public function isLogin($userName, $password)
	{
		$password1 = md5($password);
		$sql = "SELECT * FROM users WHERE userName = '$userName' AND password = '$password1'";
		$result = $this->conn->query($sql);

		if ($result->num_rows == 0)
			return false;
		else
			return true;
	}

	public function isSignup($firstName, $lastName,$userName,$password)
	{
		$query2 = "SELECT userName from users where userName = '$userName'";
		$password = md5($password);
		$result2= $this->conn->query($query2);
		if($result2->num_rows === 0)
		{
			$query1 = "INSERT INTO users(firstName,lastName,userName,password) Values('$firstName','$lastName','$userName','$password')";
			if($this->conn->query($query1))
		{
			return true;
		}
			else
		{
			return "Soory something went wrong";
		}

		}
		else{
			return "Username already exists";
		}
		

	}


	public function addPost($image, $description, $userName)
	{
		$date = date("Y-m-d");
		$img = "images/".$image;

		$sql = "SELECT userId from users WHERE userName = '$userName'";
		$result = $this->conn->query($sql);
		$userR = $result->fetch_assoc();
		$userId = $userR['userId'];

		$sql1 = "INSERT INTO post(userId, description, img, createdOn) VALUES('$userId', '$description', '$img', '$date')";
		$result = $this->conn->query($sql1);

		if (!$result)
			return false;
		else
			return true;
	}

	public function likes($userId, $postId)
	{
		$sql = "SELECT * FROM likes WHERE postId = '$postId' AND userId = '$userId'";
		$result = $this->conn->query($sql);

		if($result->num_rows == 0)
		{
			$sql = "INSERT INTO likes VALUES ('$postId', '$userId')";
			$result = $this->conn->query($sql);

			if(!$result)
				return false;
			else
				return true;
		}
		else
		{
			$sql = "DELETE FROM likes WHERE postId = '$postId' AND userId = '$userId'";
			$result = $this->conn->query($sql);

			if(!$result)
				return false;
			else
				return true;
		}
		

	}

	public function addComment($postId, $userId, $description, $image)
	{
		$img = "images/".$image;
		$date = date("Y-m-d");
		$sql = "INSERT INTO comments(postId, userId, description, img, createdOn) VALUES('postId', $userId', '$description', '$img', '$date')";
		$result = $this->conn->query($sql);

		if (!$result)
			return false;
		else
			return true;
	}

	


	public function logout()
	{
		unset($_SESSION["userName"]);
		session_destroy();
		echo "<script type='text/javascript'>alert('Succesfully Logout');window.location.href = '../index.php';</script>";
	}
}


?>