<?php
include ('/bat/connection.php');
$connection = new createConnection();
$connection->connectToDatabase();
$query = "SELECT * FROM page_detail where page = 'ABOUT'";
$result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
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
    <title>ABOUT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Links -->
    <link rel="stylesheet" href="css/search.css">


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
          <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <h2>
                about
                <small>
                  us
                </small>
              </h2>
              <?php 
            $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'About us' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
            ?>
              <img class="" src="<?php echo $row["Detail"];}?>" alt="">
               <?php 
            $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'About us' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <h2>
               our
               <small>
                 history
               </small>
              </h2>
			<?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'our history' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>

            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <h2>
                jobs
              </h2>

              <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'jobs' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>

            </div>
          </div>
        </div>
      </section>

      <section class="well well4 bg1 wow fadeIn" data-wow-duration='3s'>
        <div class="container">
        <h2>
          meet our
          <small>
            team
          </small>
        </h2>
          <div class="row offs3 center767">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="thumbnail1">
              <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'meet our team/inga north' AND Picture = 1";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    
            ?>
                <img class="" src="<?php echo $row["Detail"];}?>" alt="">
                <div class="caption">
                  <h4>
                    <a href="#">
                      Inga North
                    </a>
                  </h4>
                  <p>
                  <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'meet our team/inga north' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>
                  </p>
                </div>  
             </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="thumbnail1">
                <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'meet our team/tom nelson' AND Picture = 1";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    
            ?>
                <img class="" src="<?php echo $row["Detail"];}?>" alt="">
                <div class="caption">
                  <h4>
                    <a href="#">
                      Tom Nelson
                    </a>
                  </h4>
                  <p>
                  <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'meet our team/tom nelson' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>
                </div>  
             </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="thumbnail1">
                <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'meet our team/ivana wong' AND Picture = 1";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    
            ?>
                <img class="" src="<?php echo $row["Detail"];}?>" alt="">
                <div class="caption">
                  <h4>
                    <a href="#">
                      Ivana Wong
                    </a>
                  </h4>
                  <p>
                  <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'meet our team/ivana wong' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>
                  </p>
                </div>  
             </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="thumbnail1">
                <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'meet our team/richard cox' AND Picture = 1";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    
            ?>
                <img class="" src="<?php echo $row["Detail"];}?>" alt="">
                <div class="caption">
                  <h4>
                    <a href="#">
                      Richard Cox
                    </a>
                  </h4>
                  <p>
                  <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'meet our team/richard cox' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>
                  </p>
                </div>  
             </div>
            </div>
          </div>
        </div>
      </section>    

      <section class="well well5">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <h2>
                advantages  
              </h2>
              <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'advantages' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <h2>
                purposes
              </h2>
              <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'purposes' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <h2>
               testimonial
              </h2>
              <blockquote class="media offs3">   
                <div class="media-left media_ins1">
                <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'testimonial' AND Picture = 1";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    
            ?>
                  <img src="<?php echo $row["Detail"];}?>" alt="">
                </div>             
                <?php 
                $query = "SELECT * FROM page_detail where page = 'ABOUT' AND Name = 'testimonial' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>
              </blockquote>
                           
            </div>
          </div>
        </div>
      </section>

    </main>
<?php $connection->closeConnection();?>
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
      <div align='center'>          
<a href="http://www.hitwebcounter.com" target="_blank">
<img src="http://hitwebcounter.com/counter/counter.php?page=6753601&style=0006&nbdigits=8&type=ip&initCount=0" title="http://www.hitwebcounter.com/htmltutorial.php" Alt="http://www.hitwebcounter.com/htmltutorial.php"   border="0" >
</a>                                        <br/> <a href='http://www.hit-counts.com'>Visitor</a></div>           
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
