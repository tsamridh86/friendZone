<?php
class Users{
	public function __construct($conn)
	{
		$this->conn = $conn;
	}
	
	public function isLogin($username, $password)
	{
		$password1 = md5($password);
		$sql = "SELECT * FROM users WHERE userName = '$userName' AND password = "$password1"";
		$result = $this->conn->query($sql);

		if ($result->num_rows == 0)
			return false;
		else
			return true;
	}
}


?>