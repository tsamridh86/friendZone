<?php
class Users{
	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function is_signup($firstName, $lastName,$userName,$password,$photo)
	{
		$query2 = "SELECT userName from users where userName = '$userName'";
		$password = md5($password);
		$result2= $this->conn->query($query2);
		if($result2->num_rows === 0)
		{
			$query1 = "INSERT INTO users(firstName,lastName,userName,password,profilePhoto) Values('$firstName','$lastName','$userName','$password','$photo')";
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
}
?>