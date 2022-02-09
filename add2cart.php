<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$conn = new mysqli('localhost', 'root', '','dbms_project');

// get the post records
$pid = $_POST['c_pid'];
$name = $_POST['c_name'];
$cost = $_POST['c_cost'];
$img_src = $_POST['c_imgsrc'];
$qt = $_POST['c_qt'];


// database insert SQL code
if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("INSERT INTO `cart` (`pid`,`name`,`cost`,`img_src`,`quantity`) VALUES ('$pid','$name','$cost','$img_src','$qt')");
		//$stmt = $conn->prepare("INSERT INTO `products` (`pid`,`name`,`cost`,`category`) VALUES ('$pid','$name','$cost','$category')");
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful";
		$stmt->close();
		$conn->close();
	}

?>
