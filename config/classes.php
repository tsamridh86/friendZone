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
	public function logout()
	{
		unset($_SESSION["userName"]);
		session_destroy();
		echo "<script type='text/javascript'>alert('Succesfully Logout');window.location.href = '../index.php';</script>";
	}
}


?>