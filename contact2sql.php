
<?php

if (isset($_POST['name']) && isset($_POST['phone'])) && isset($_POST['email']) && isset($_POST['lastname'])){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$lastname = $_POST['lastname'];
	$query = "INSERT INTO `customer_details` (`CustID`, `Name`, `LastName`, `Phone_Number`, `Email_id`) VALUES ( NULL, '$name', '$lastname', '$phone', '$email')";
	$result = mysqli_query($mysqli, "$query") or die(mysqli_error($mysqli));
	echo 'data inserted in Database';
}
?>
