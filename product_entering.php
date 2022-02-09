<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$conn = new mysqli('localhost', 'root', '','dbms_project');

// get the post records
$pid = $_POST['ID'];
$name = $_POST['PName'];
$category = $_POST['category'];
$cost = $_POST['cost'];
$img_src = $_POST['imgsrc'];


// database insert SQL code
if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("INSERT INTO `products` (`pid`,`name`,`cost`,`category`,`img_src`) VALUES ('$pid','$name','$cost','$category','$img_src')");
		//$stmt = $conn->prepare("INSERT INTO `products` (`pid`,`name`,`cost`,`category`) VALUES ('$pid','$name','$cost','$category')");
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful";
		$stmt->close();
		$conn->close();
	}

?>
