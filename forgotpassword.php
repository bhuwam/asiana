<?php

$mysqli = new mysqli('localhost', 'root', '','asiana');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
	
	echo 'Connection OK and ';
	}

	
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["username"])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
		
	$query1 = "SELECT Password FROM `users` WHERE Username='$username'";
	$result = mysqli_query($mysqli, $query1) or die(mysqli_error($mysqli));
	$count = mysqli_num_rows($result);

	$query2 = "SELECT Email_id FROM `customer_details` WHERE Name='$name'";
	$result2 = mysqli_query($mysqli, $query2) or die(mysqli_error($mysqli));
	$count1 = mysqli_num_rows($result);

	if ($count == 1 && $count1 == 1){	
		echo 'add code for email password to email
		Check your email for password and please <a href="adminlogin.html">login</a>';
	}
	else{
		echo 'please check again. <a href="forgotpassword.html">try again</a>';
	}
}

?>