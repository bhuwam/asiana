<?php

include ('connection.php');
$connection = new createConnection();
$connection->connectToDatabase();

$mysqli = $connection->myconn;

	
if (isset($_POST['name'])){
	if (isset($_POST['lastname'])){	
		$lastname = $_POST['lastname'];
		$name = $_POST['name'];
		$query2 = "UPDATE customer_details SET LastName='$lastname' WHERE Name='$name'";
		$result = mysqli_query($mysqli, "$query2") or die(mysqli_error($mysqli));
		
		}
		
	if (isset($_POST['phone'])){	
		$phone = $_POST['phone'];
		$name = $_POST['name'];
		$query3 = "UPDATE customer_details SET Phone_Number='$phone' WHERE Name='$name'";
		$result = mysqli_query($mysqli, "$query3") or die(mysqli_error($mysqli));
		
		}
		
	if (isset($_POST['email'])){	
		$email = $_POST['email'];
		$name = $_POST['name'];
		$query4 = "UPDATE customer_details SET Email_id='$email' WHERE Name='$name'";
		$result = mysqli_query($mysqli, "$query4") or die(mysqli_error($mysqli));
		}
	echo'Details changed <a href="../CustomerConsole.php">Go back</a>';
}
else{
	echo 'please try again. <a href="../changedetails.php">try again</a>';
	}
?>

