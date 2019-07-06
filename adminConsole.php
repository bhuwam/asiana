<?php
include ('/bat/connection.php');
session_start(); //Start the session
$user= $_SESSION['username']; //Get the user name from the previously registered super global variable
if($user==''){ //If session not registered
header("location:adminlogin.php"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );
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
    <title>ADMIN HOME</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Links -->
    <link rel="stylesheet" href="css/admin-form.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/google-map.css">


    <!--JS-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/rd-smoothscroll.min.js"></script>
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
        <p>   </p>
          <a href="callto:#">0426 773 001</a>
          <small><span>Hours:</span>  9am-5pm AEST M-Fri; &nbsp;9am-3pm AEST Sat</small>
        </div>
      </div>


      <div id="stuck_container" class="stuck_container">
        <div class="container">   
        <nav class="navbar navbar-default navbar-static-top pull-left">            

            <div class="">  
              <ul class="nav navbar-nav sf-menu" data-type="navbar">
<?php 
$connection = new createConnection();
$connection->connectToDatabase();
$query = "SELECT DISTINCT Page FROM page_detail ";
$result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
                <li class="dropdown">
                  <a href="?page=<?php echo $row["Page"];   ?>"><?php echo $row["Page"];   ?><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a>
                  
                  <ul class="dropdown-menu">
                  <?php 
                  $query = "SELECT DISTINCT Name FROM page_detail WHERE Page= '" . $row["Page"]. "'";
                  $result1 = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                  if ($result1->num_rows > 0) {
                      // output data of each row
                      while($row1 = $result1->fetch_assoc()) {
                  ?>
                    <li>
                      <a href="?page=<?php echo $row["Page"];   ?>&id=<?php echo $row1['Name'];?>"><?php echo $row1['Name'];?></a> 
                    </li>
                    <?php 
                      }
                  }
                    ?>
                    </ul>
                </li>
<?php 
}
} else {
    echo "0 results";
}
?>               
				<li><a href="updatepage.php">Page Link</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>                           
            </div>
			
        </nav>   
        <form class="search-form" action="search.php" method="GET" accept-charset="utf-8">
          <label class="search-form_label">
            <input class="search-form_input" type="text" name="s" autocomplete="off" placeholder=""/>
            <span class="search-form_liveout"></span>
          </label>
          <button class="search-form_submit fa-search" type="submit"></button>
        </form>
             
        </div>

      </div>
    </header>

  <!--========================================================
                            CONTENT
  =========================================================-->

    <main>        
<section class="well well4">
        <div class="container">
         
              <form id="admin-form" class='admin-form' method="POST" action="bat/adminupdatepage.php">
                <div class="admin-form-loader"></div>
<?php
$page = $_GET['page'];
$id="";
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
$i = 0;
if($id<>""){
    $query = "SELECT DISTINCT Name FROM page_detail WHERE Page='" . $page . "' AND Name='". $id ."'";
} else {
    $query = "SELECT DISTINCT Name FROM page_detail WHERE Page='" . $page . "'";
}
$result = mysqli_query($connection->myconn, "$query") or die(mysqli_error($connection->myconn));
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
                <h2><small><?php echo $row["Name"] ?>  </small></h2>
              
                <fieldset>
	<label class="message">
<?php 
$query = "SELECT * FROM page_detail WHERE Page='".$page."' AND Picture = 1 AND Name = '" . $row["Name"] . "'";
$result1 = mysqli_query($connection->myconn, "$query") or die(mysqli_error($connection->myconn));
$row1 = $result1->fetch_assoc();
$query = "SELECT * FROM page_detail WHERE Page='".$page."' AND Picture = 0 AND Name = '" . $row["Name"] . "'";
$result2 = mysqli_query($connection->myconn, "$query") or die(mysqli_error($connection->myconn));
$row2 = $result2->fetch_assoc();
?>		
				<input type="hidden" name="id<?php echo $i;?>" value="<?php echo $row1["ID"];?>"/>
				Picture<input type="text" name="detail<?php echo $i?>" value="<?php echo $row1["Detail"];$i++; ?>" data-constraints="@Required @JustLetters"/>
				<input type="hidden" name="id<?php echo $i;?>" value="<?php echo $row2["ID"];?>"/>
                Detail<textarea name="detail<?php echo $i;?>"  data-constraints="@Required @Length(min=1,max=999999)"><?php echo $row2["Detail"] ;$i++;  ?></textarea>
                  </label>    
   </fieldset>

<?php 

}
} else {
    echo "0 results";
}
$connection->closeConnection();
?>
				<input type="hidden" name="i" value="<?php echo $i;?>"/>
				<input type="hidden" name="page" value="<?php echo $page;?>"/>
                    <div class="btn-wr text-primary">
                    <button class="btn btn-primary" type="submit">SAVE</button>
                  </div>
                  <div class="btn-wr text-primary">
                    <button class="btn btn-primary" type="reset">RESET</button>
                  </div>

              
     </form>                
        </div>        
      </section>
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
