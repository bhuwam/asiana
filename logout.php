<?php

include ('/bat/connection.php');
session_start();
session_destroy();
//$user= $_SESSION['username'];
header('location:index.php');
?>