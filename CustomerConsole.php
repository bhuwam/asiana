<?php

include ('/bat/connection.php');
$connection = new createConnection();
$connection->connectToDatabase();

$mysqli = $connection->myconn;

session_start(); //Start the session
$username = $_SESSION['username']; //Get the user name from the previously registered super global variable
if($username ==''){ //If session not registered
    header( 'Content-Type: text/html; charset=utf-8' ); // Redirect to login.php page
}
else //Continue to current page
{
header( 'Content-Type: text/html; charset=utf-8' );
	
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>CUSTOMER LOGIN</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Links -->
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/google-map.css">


    <!--JS-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/rd-smoothscroll.min.js"></script>


    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    <script src='js/device.min.js'></script>
  </head>
  <body>
  <div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>  
      <div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a data-type='rd-navbar-brand'  href="./">ASIANA IMPORTS</a>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

		<div class="help-box text-right">
        <div class="fb-page" 
  			data-href="https://www.facebook.com/beadsnbeads/"
  			data-width="380" 
 			data-hide-cover="false"
 			data-show-facepile="false">
 		</div>
        </div>
      </div>


      <div id="stuck_container" class="stuck_container">
        <div class="container">   
        <nav class="navbar navbar-default navbar-static-top pull-left">            

            <div class="">  
              <ul class="nav navbar-nav sf-menu" data-type="navbar">
                <li><a href="#">SOMEACTION</a></li>
                
				<li><a href="logout.php">LOGOUT</a></li>
										 
              </ul>                           
            </div>
        </nav>
        
             
        </div>

      </div>  
    </header>

  <!--========================================================
                            CONTENT
  =========================================================-->

    <main>        
	<h2>
		<header> Customer Login</header>
	</h2>
	
	
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Last name</th>
                <th>Phone number</th>
                <th>Email</th>
               
            </tr>
        </thead>
		
        <tbody>
            <tr>
                <th scope="row">1</th>
        
		<td><?php
		$query1 = "SELECT * FROM `customer_details` WHERE Name='$username'";
		$result = mysqli_query($mysqli, $query1) or die(mysqli_error($mysqli));
		$row = mysqli_fetch_assoc($result);
		
		echo $row['Name'];	?></td>
        
		<td><?php
		echo $row['LastName'];
		?></td>
              
        <td><?php	
		echo $row['Phone_Number'];	?></td>
        
		<td><?php
		$_SESSION['Email']= $row['Email_id'];
		echo $row['Email_id'];	?></td>
                <td><a href="changedetails.php">edit</a> </td>
            </tr>
            
        </tbody>
    </table>
</div>

    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer class="top-border">

    
     

    <section class="well1">
      <div class="container"> 
            <p class="rights">
              Asiana imports PTY. LTD  &#169; <span id="copyright-year"></span>
              <a href="index-5.html">Privacy Policy</a>
            </p>          
      </div> 
    </section>    
  </footer>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->         
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tm-scripts.js"></script>    
  <!-- </script> -->


  </body>
</html>
