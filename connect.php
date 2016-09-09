<?php


<<<<<<< HEAD
$conn = new mysqli("localhost","root","y0l0adm1n","friendzone");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
=======
$connection = new mysqli("localhost","root","","friendzone");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
>>>>>>> 675b17673b949c48ac6049684007bedd568a25eb
} 
else{
	
}
?>