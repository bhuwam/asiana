<?php
include ('connection.php');

$connection = new createConnection();
$connection->connectToDatabase();
  
if (isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//$pass = $password;
	$pass = md5($password);
	$query1 = "SELECT Type FROM `users` WHERE Username='$username' and Password='$pass'";
	$result = mysqli_query($connection->myconn, $query1) or die(mysqli_error($connection->myconn));
	$row = mysqli_fetch_assoc($result);
	
	if ($row["Type"] == 1){
			$query2 = "INSERT INTO `login_log` (`ID`, `Username`, `Last_log`, `Type`) VALUES (NULL , '$username', CURRENT_TIMESTAMP, '1');";
			$result = mysqli_query($connection->myconn, $query2) or die(mysqli_error($connection->myconn));
			 session_start();
			$_SESSION['username']= $username;
			header('location:../CustomerConsole.php');
		}

	else if($row["Type"] == '2'){
			$query3 = "INSERT INTO `login_log` (`ID`, `Username`, `Last_log`, `Type`) VALUES (NULL , '$username', CURRENT_TIMESTAMP, '2');";
			$result = mysqli_query($connection->myconn, $query3) or die(mysqli_error($connection->myconn));
			 session_start();
			$_SESSION['username']= $username;
			header('location:../adminConsole.php?page=HOME');
		}
	else {
	echo 'Wrong Username or Password';
	}
}
?>
