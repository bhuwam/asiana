<?php
$mysqli = new mysqli('localhost', 'root', '','asiana');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
  
  
if (isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM `users` WHERE Username='$username' and Password='$password'";
	$result = mysqli_query($mysqli, "$query") or die(mysqli_error($mysqli));
$count = mysqli_num_rows($result);
if ($count == 1){
    session_start();
    $_SESSION['username']= $username;
	header('location:adminConsole.php?page=HOME');
}
else {
	echo 'Wrong Username or Password';
}}
?>