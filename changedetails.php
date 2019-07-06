<?php
include ('/bat/connection.php');
session_start(); //Start the session
$user= $_SESSION['username'];
$email= $_SESSION['Email'];//Get the user name from the previously registered super global variable
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
    <title>CHANGE DETAILS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Links -->
    <link rel="stylesheet" href="css/contact-form.css">
    <link rel="stylesheet" href="css/google-map.css">
    <link rel="stylesheet" href="css/search.css">

    <!--JS-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <!--<script src="js/rd-smoothscroll.min.js"></script>-->


  
    
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
          <p>Need help?</p>
          <a href="callto:#">0426 773 001</a>
          <small><span>Hours:</span>  6am-4pm PST M-Th; &nbsp;6am-3pm PST Fri</small>
        </div>
      </div>
<?php 
$connection = new createConnection();
$connection->connectToDatabase();
function get_menu_tree($parent_id)
{
    global $connection;
    $menu = "";
    $sqlquery = " SELECT * FROM page_link where Parent= '" .$parent_id . "'";
    $res=mysqli_query($connection->myconn, $sqlquery) or die(mysqli_error($connection->myconn));
    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        if ($row['Level'] == 0) {
            $sqlquery = " SELECT * FROM page_link where Parent='" . $row['Name'] . "'";
            $res1=mysqli_query($connection->myconn, $sqlquery) or die(mysqli_error($connection->myconn));
            if ($res1->num_rows > 0) {
                $menu .= "<li class='dropdown' >";
                $menu .="<a href='".$row['Link']."'>".$row['Name']." <span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span></a>";
                $menu .= "<ul class='dropdown-menu'>".get_menu_tree($row['Name'])."</ul>";
                $menu .= "</li>";
            }
            else{
                $menu .="<li><a href='".$row['Link']."'>".$row['Name']."</a>";
                
                $menu .= "<ul>".get_menu_tree($row['Name'])."</ul>"; //call  recursively
                
                $menu .= "</li>";
            }
        }
        else{
            $sqlquery = " SELECT * FROM page_link where Parent='" . $row['Name'] . "'";
            $res1=mysqli_query($connection->myconn, $sqlquery) or die(mysqli_error($connection->myconn));
            if ($res1->num_rows > 0) {
                $menu .="<li><a href='".$row['Link']."'>".$row['Name']."</a>";
                
                $menu .= "<ul class='dropdown-menu'>".get_menu_tree($row['Name'])."</ul>"; //call  recursively
                
                $menu .= "</li>";
            }
            else
            {
                $menu .="<li><a href='".$row['Link']."'>".$row['Name']."</a>";
                
                $menu .= "<ul>".get_menu_tree($row['Name'])."</ul>"; //call  recursively
                
                $menu .= "</li>";
            }
            
        }
    }
    
    return $menu;
}
$sqlquery = " SELECT * FROM customer_details where Email_id='" . $email . "'";
$res=mysqli_query($connection->myconn, $sqlquery) or die(mysqli_error($connection->myconn));
$row = mysqli_fetch_assoc($res);
?>
      <div id="stuck_container" class="stuck_container">
        <div class="container">   
        <nav class="navbar navbar-default navbar-static-top pull-left">            

            <div class="">  
              <ul class="nav navbar-nav sf-menu" data-type="navbar">      

<?php echo get_menu_tree(0);//start from root menus having parent id 0 ?>
         
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

      

      <section class="well well4">
        <div class="container">
         
              <h2>
                CHANGE 
                <small>
                DETAILS
                </small>
              </h2>       
	
			
			
		  <form  method="post" action="bat/changedetails.php" >
		  
			<label class="name">
                <input type="text" name="name" placeholder="Name:" value="<?php echo $row['Name'];?>" data-constraints="@Required @JustLetters"/>
			</label>              
              
			<label class="last name">
                <input type="text" name="lastname" placeholder="Last Name:" value="<?php echo $row['LastName'];?>" data-constraints="@Required @JustLetters"/>
			</label> 
			<br>	  
            <label class="phone">
                <input type="text" name="phone" placeholder="Phone:" value="<?php echo $row['Phone_Number'];?>" data-constraints="@JustNumbers"/>
			</label>
			
            <label class="email">
                <input type="text" name="email" placeholder="Email:" value="<?php echo $row['Email_id'];?>" data-constraints="@Required @Email"/>
			</label>
			<br>
                 <input type="submit"  value="CHANGE"/> 
		  </form>
		
					
        </div>        
      </section>

      

    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer>
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
