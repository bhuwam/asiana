
<?php

include ('connection.php');
$connection = new createConnection();
$connection->connectToDatabase();

$mysqli = $connection->myconn;


if (isset($_POST['name']) && isset($_POST['phone'])  && isset($_POST['username'])  && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['lastname'])){
	
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$query = "INSERT INTO `customer_details` (`CustID`, `Name`, `LastName`, `Phone_Number`, `Email_id`) VALUES ( NULL, '$name', '$lastname', '$phone', '$email')";
	$result = mysqli_query($mysqli, "$query") or die(mysqli_error($mysqli));
	
	$query1 = "INSERT INTO `users` (`Username`, `Password`, `Type`) VALUES ('$username', '$password', '1')";
	$result = mysqli_query($mysqli, "$query1") or die(mysqli_error($mysqli));
	
	echo 'Registeration successful. please <a href="../adminlogin.php">login</a>';
	 
}
?>
