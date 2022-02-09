<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$conn = new mysqli('localhost', 'root', '','dbms_project');

// get the post records
$pid = $_POST['d_pid'];
$qt = $_POST['d_qt'];



// database insert SQL code
if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
        if ($qt>1){
		    $stmt = $conn->prepare("UPDATE cart SET quantity=quantity-1 WHERE pid=$pid");}
        else{
            $stmt = $conn->prepare("DELETE FROM `cart` WHERE pid=$pid");
        }
		//$stmt = $conn->prepare("INSERT INTO `products` (`pid`,`name`,`cost`,`category`) VALUES ('$pid','$name','$cost','$category')");
		$execval = $stmt->execute();
		//echo $execval;
		//echo "Registration successful";
		$stmt->close();
		$conn->close();
	}

?>
