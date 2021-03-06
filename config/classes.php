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

	public function getProfileByUserName($userName)
	{
		$sql = "SELECT * FROM users WHERE userName = '$userName'";
		$result = $this->conn->query($sql);

		$row = $result->fetch_assoc();

		return $row;
	}

	public function editProfile($firstName, $lastName, $userName, $password, $image)
	{
		$sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', password = '$password', profilePhoto = '$image' WHERE userName = '$userName'";
		$result = $this->conn->query($sql);
		
		if(!$result)
			return false;
		else
			return true;

	}

	public function editPost($image, $description, $postId)
	{
		$sql = "UPDATE post SET description = '$description', img = '$image' WHERE postId = '$postId'";
		$result = $this->conn->query($sql);

		if(!$result)
			return false;
		else
			return true;
	}

	public function addPost($image, $description, $userName)
	{
		if($image)
		{
			$img = "../images/".$image;
		}
		else
		{
			$img='';
		}

		$sql = "SELECT userId from users WHERE userName = '$userName'";
		$result = $this->conn->query($sql);
		$userR = $result->fetch_assoc();
		$userId = $userR['userId'];

		$sql1 = "INSERT INTO post(userId, description, img) VALUES('$userId', '$description', '$img')";
		$result = $this->conn->query($sql1);

		if (!$result)
			return false;
		else
			return true;
	}

	public function likes($userId, $postId)
	{


		$result = $this->isLiked($userId, $postId);

		if(!$result)
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

	
	public function isLiked($userId, $postId)
	{
		$sql = "SELECT * FROM likes WHERE postId = '$postId' AND userId = '$userId'";
		$result = $this->conn->query($sql);

		if($result->num_rows == 0)
			return false;
		else
			return true;
	}

	public function addComment($postId, $userId, $description)
	{
		
		$sql = "INSERT INTO comments(postId, userId, description) VALUES('$postId', '$userId', '$description')";
		$result = $this->conn->query($sql);

		if (!$result)
			return false;
		else
			return true;
	}

	public function getNoOfLikes($postId)
	{
		$sql = "SELECT COUNT(userId) AS noOfLikes from likes where postId = ".$postId;
		$result = $this->conn->query($sql);
		$result = $result->fetch_assoc();
		$result=$result['noOfLikes'];
		return $result;
	}

	public function getNoOfComments($postId)
	{
		$sql = "SELECT COUNT(userId) AS noOfComments FROM  comments WHERE postId = ".$postId;
		$result = $this->conn->query($sql);
		$result = $result->fetch_assoc();
		$result = $result['noOfComments'];
		return $result;
	}

	public function logout()
	{
		unset($_SESSION["userName"]);
		session_destroy();
		echo "<script type='text/javascript'>alert('Succesfully Logout');window.location.href = '../index.php';</script>";
	}
	
	public function getPosts($userName)
	{
		$sql = "SELECT userId from users WHERE userName = '$userName'";
		$result = $this->conn->query($sql);
		$userR = $result->fetch_assoc();
		$userId = $userR['userId'];
		if($userId)
		{
			$query1="SELECT user2 from follows WHERE user1='$userId'";
			$result1 = $this->conn->query($query1);
			if($result1->num_rows > 0)
			{
				$user2=$userId.'$';
				while ($row=$result1->fetch_assoc()) {
					$user2=$user2.$row['user2'];
					$user2=$user2.'$';//delimeter between userIds
				}
				$user2Id=explode('$',$user2);//converted into array
				$query2="SELECT postId,userId,description,img,createdOn from post WHERE userId='$user2Id[0]'";
				if(count($user2Id)>1)//check if only one user then
				{
					$i=1;
					while ($i < count($user2Id)) {
						$query2=$query2."OR userId='$user2Id[$i]'";
						$i=$i+1;
					}
					$query2=$query2."ORDER BY createdOn DESC";
				}
				$result2=$this->conn->query($query2);
				if($result2){
					$posts=array("index"=>array(
								 "userId"=>'',
								"description"=>'',
								"img"=>'',
								"createdOn"=>'',
								"postId"=>''));
					$i=0;
					while ($row=$result2->fetch_assoc()) {
						$posts[$i]['userId']=$row['userId'];
						$posts[$i]['description'] = $row['description'];
						$posts[$i]['img'] = $row['img'];
						$posts[$i]['createdOn']=$row['createdOn'];
						$posts[$i]['postId']=$row['postId'];
						$i=$i+1;
					}
					return $posts;
				}
				else{
					return "something went wrong";
				}
			}
			else{
				return "Follow Someone";
			}

		}
		else {
			return "No id found";
		}

	}
	public function getProfileByUserId($userId)
	{
		$query="SELECT firstName,lastName,userName,profilePhoto from users where userId='$userId'";
		$result = $this->conn->query($query);
		$profile=$result->fetch_assoc();
		return $profile;
	}
	public function getUserAndPostByPostId($postId)
	{
		$query="SELECT userId,description,img,createdOn from post WHERE postId='$postId'";
		$result = $this->conn->query($query);
		$postDetails=$result->fetch_assoc();
		$userId=$postDetails["userId"];
		$userDetais=$this->getProfileByUserId($userId);
		$postDetails['userName']=$userDetais['userName'];
		$postDetails['profilePhoto']=$userDetais['profilePhoto'];
		return $postDetails;
	}
	public function getCommentsByPostId($postId)
	{
		$query="SELECT userId,description,createdOn from comments WHERE postId='$postId'";
		$result = $this->conn->query($query);
		$i=0;
		if($result){
			$comments=array("index"=>array(
									 "userId"=>'',
									"description"=>'',
									"createdOn"=>'',
									"userName"=>'',
									"profilePhoto"=>''));
			while ($row = $result->fetch_assoc()) {
				$comments[$i]['userId']=$row['userId'];
				$comments[$i]['description']=$row['description'];
				$comments[$i]['createdOn']=$row['createdOn'];
				$profile = $this->getProfileByUserId($comments[$i]['userId']);
				$comments[$i]['userName']=$profile['userName'];
				$comments[$i]['profilePhoto']=$profile['profilePhoto'];
				$i=$i+1;
			}
			return $comments;
		}
		else
			return false;
	}

	public function searchUsers($search)
	{
		$query="SELECT userId,userName,firstName,lastName,profilePhoto from users WHERE ((userName LIKE '%$search%') OR (firstName LIKE '%$search%') OR (lastName LIKE '%$search%'))";
		$result = $this->conn->query($query);
		if($result->num_rows >=1){
			$searchedUsersList=array("index"=>array(
								 "userId"=>'',
								"userName"=>'',
								"firstName"=>'',
								"lastName"=>'',
								"profilePhoto"=>''));
			$i=0;
			while ($row =$result->fetch_assoc()) {
				$searchedUsersList[$i]['userId']=$row['userId'];
				$searchedUsersList[$i]['userName']=$row['userName'];
				$searchedUsersList[$i]['firstName']=$row['firstName'];
				$searchedUsersList[$i]['lastName']=$row['lastName'];
				$searchedUsersList[$i]['profilePhoto']=$row['profilePhoto'];
				$i=$i+1;
			}
			return $searchedUsersList;
		}
		else if($result->num_rows == 0)
		{
			return "No records found";
		}
		else{
			return "Something went wrong";
		}
	}

	public function getTrending()
	{
		// the very danger line written by Samridh Tuladhar to get the most trending posts
		$sql = "select postId , description, userId , userName from post natural join users natural join (SELECT count(userId) as noOfLikes , postId from likes group by (postId)) x order by noOfLikes desc limit 6";
		$result = $this->conn->query($sql);
		if($result->num_rows >=1){
			$mostTrending=array("index"=>array(
								 "postId"=>'',
								"description"=>'',
								"userId"=>'',
								"userName"=>''));
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$mostTrending[$i]['postId'] = $row['postId'];
				$mostTrending[$i]['description'] = $row['description'];
				$mostTrending[$i]['userId'] = $row['userId'];
				$mostTrending[$i]['userName'] = $row['userName'];
				$i = $i + 1;
			}
			return $mostTrending;
		}
		else if($result->num_rows == 0)
		{
			return "No records found";
		}
		else{
			return "Something went wrong";
		}
	}

	public function getMostPopular()
	{
		$sql = "select userName, firstName , lastName, profilePhoto from users inner join (SELECT count(user1) as noOfFollowers , user2 from follows group by user2 order by noOfFollowers desc)x on users.userId = x.user2 order by noOfFollowers desc limit 6";
		$result = $this->conn->query($sql);
		if($result->num_rows >=1){
			$mostPopular=array("index"=>array(
								 "userName"=>'',
								"firstName"=>'',
								"lastName"=>'',
								"profilePhoto"=>''));
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$mostPopular[$i]['userName'] = $row['userName'];
				$mostPopular[$i]['firstName'] = $row['firstName'];
				$mostPopular[$i]['lastName'] = $row['lastName'];
				$mostPopular[$i]['profilePhoto'] = $row['profilePhoto'];
				$i = $i + 1;
			}
			return $mostPopular;
		}
		else if($result->num_rows == 0)
		{
			return "No records found";
		}
		else{
			return "Something went wrong";
		}
	}

	public function getFollowing($userName,$requestType)
	{
		$user = $this->getProfileByUserName($userName);
		$userId = $user['userId'];
		if($requestType == "following"){
			$sql = "SELECT users.userId as userId, users.userName as userName, users.firstName as firstName, users.lastName as lastName, users.profilePhoto as profilePhoto FROM follows INNER JOIN users ON follows.user2 = users.userId where follows.user1 = ".$user['userId'];
		}
		if($requestType == "followers")
		{
			$sql = "SELECT users.userId as userId, users.userName as userName, users.firstName as firstName, users.lastName as lastName, users.profilePhoto as profilePhoto FROM follows INNER JOIN users ON follows.user1 = users.userId where follows.user2 = ".$user['userId'];	
		}
		$result = $this->conn->query($sql);
		if(!$result)
			return "Something went wrong";
		else
		{
			if($result->num_rows == 0)
				return "You are not following anyone";
			else
			{
				$i = 0;
				$following = array("index"=>array(
												"userId"=>'',
												"userName"=>'',
												"firstName"=>'',
												"lastName"=>'',
												"profilePhoto"=>''));

				while($row = $result->fetch_assoc())
				{
					$following[$i]['userId']=$row['userId'];
					$following[$i]['userName']=$row['userName'];
					$following[$i]['firstName']=$row['firstName'];
					$following[$i]['lastName']=$row['lastName'];
					$following[$i]['profilePhoto']=$row['profilePhoto'];
					$i = $i+1;
				}
				return $following;
				
			}
		}
	}

	public function follow($user1, $user2)
	{
		$isFollowing = $this->isFollowing($user1, $user2);

		if(!$isFollowing)
		{
			$sql = "INSERT INTO follows VALUES ('$user1', '$user2')";
			$result = $this->conn->query($sql);
			if(!$result)
				return false;
			else
				return true;
		}
		else
		{
			$sql = "DELETE FROM follows WHERE user1 = '$user1' AND user2 = '$user2'";
			$result = $this->conn->query($sql);
			if(!$result)
				return false;
			else
				return true;
		}


	}


	public function isFollowing($user1, $user2)
	{
		$sql = "SELECT * FROM follows WHERE user1 = '$user1' AND user2 = '$user2'";
		$result = $this->conn->query($sql);

		if($result->num_rows == 0)
			return false;
		else
			return true;
	}
	public function getPostsForProfile($userName)
	{
		$sql = "SELECT userId from users WHERE userName = '$userName'";
		$result = $this->conn->query($sql);
		$userR = $result->fetch_assoc();
		$userId = $userR['userId'];
		if($userId){
				$query1="SELECT postId,description,img,createdOn from post WHERE userId='$userId' ORDER BY createdOn DESC";
				$result1=$this->conn->query($query1);
				if($result1->num_rows >= 1)
				{
					$i = 0;
				$posts = array("index"=>array(  "postId"=>'',
 												"description"=>'',
												"img"=>'',
												"createdOn"=>''));
				while ($row=$result1->fetch_assoc()) {
						$posts[$i]["postId"]=$row["postId"];
						$posts[$i]["description"]=$row["description"];
						$posts[$i]["img"]=$row["img"];
						$posts[$i]["createdOn"]=$row["createdOn"];
						$i=$i+1;
					}
					return $posts;
				}
				else{
					return "No posts found";
				}
		}
		else{
			return "No id found";
		}
	}
	public function deletePost($postId){
		$query1="SELECT img FROM post WHERE postId='$postId'";
		$result1=$this->conn->query($query1);
		if($result1->num_rows>0)
		{
			$row=$result1->fetch_assoc();
			if($row['img']!=''){
			unlink($row['img']);
		}
		$query2="DELETE FROM comments WHERE postId='$postId'";
		$result2=$this->conn->query($query2);
		if(!$result2)
		{

			return false;
		}
		$query3="DELETE FROM likes WHERE postId='$postId'";
		$result3=$this->conn->query($query3);
		if(!$result3)
		{

			return false;
		}
		$query="DELETE FROM post WHERE postId='$postId'";
		$result=$this->conn->query($query);
		if($result)
		{

			return true;
		}
		else{
			return false;
		}
	}
		else{
			return false;
		}
	}
	
	
}



function numberOfDigits ($num)
{
    if($num == 1) return 1;
    else return ceil(log10($num));
    
}    


function nameOfFile($fileName, $extension = '', $directory = '' )
	{
		$i = 0;
		$len = strlen($extension);
		while(file_exists($directory.$fileName))
		{
			if(!$i) 
			$fileName = substr($fileName,0,-$len).$i.substr($fileName, -$len);
			else 	 
				$fileName= substr($fileName,0,-(numberOfDigits($i)+$len)).$i.substr($fileName, -$len);
			$i++;
		}

		return $directory.$fileName;
		}


