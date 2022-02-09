<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$conn = new mysqli('localhost', 'root', '','dbms_project');

// get the post records
$email = $_POST['email'];
$pw = $_POST['password'];

// database insert SQL code
if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("INSERT INTO `users` (`email`,`password`) VALUES ('$email','$pw')");
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful";
		$stmt->close();
		$conn->close();
	}

?>
