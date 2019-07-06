<?php
include ('/bat/connection.php');
$connection = new createConnection();
$connection->connectToDatabase();
$query = "SELECT * FROM page_detail where page = 'SERVICES'";
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
    <title>SERVICES</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Links -->
    <link rel="stylesheet" href="css/jquery.fancybox.css">
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
          <h2 class='offs5'>
            featured 
            <small>
              services
            </small>            
          </h2>
          <div class="row offs3">
            <div class="col-md-4 col-sm-12 col-xs-12">
            <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured service/consultancy thump' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>
              <a class="thumb" data-fancybox-group='1' href="<?php echo $row["Detail"];}?>"> 
              <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured service/consultancy' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>             
                <img class="" src="<?php echo $row["Detail"];}?>" alt="">
                <span class='thumb_overlay'></span>
              </a>
              <p class="lead">
                Consultancy 
              </p>
              <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured service/consultancy' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>      
                <a href="#" class="btn-link l-h1 fa-angle-right"></a>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured services/IT solutions thump' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>
              <a class="thumb" data-fancybox-group='1' href="<?php echo $row["Detail"];}?>"> 
              <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured services/IT solutions' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>             
                <img class="" src="<?php echo $row["Detail"];}?>" alt="">
                <span class='thumb_overlay'></span>
              </a>
              <p class="lead">
                IT Solution 
              </p>
              <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured services/IT solutions' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>      
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured services/ support academic organisations thump' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>
              <a class="thumb" data-fancybox-group='1' href="<?php echo $row["Detail"];}?>"> 
              <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured services/ support academic organisations' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>             
                <img class="" src="<?php echo $row["Detail"];}?>" alt="">
                <span class='thumb_overlay'></span>
              </a>
              <p class="lead">
                Support Academic Organisations 
              </p>
              <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'featured services/ support academic organisations' AND Picture = 0";
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
		<?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'Footer' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>   
      <section class="well well6 parallax parallax1" data-url="<?php echo $row["Detail"];}?>" data-mobile="
      true" data-speed="0.7">
        <div class="container">
          <div class="wrap text-center">
          <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'Footer' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>              
          </div>  
        </div>        
      </section>

      <section class="well well2">
        <div class="container">
        <h2>
          services
          <small>
            list
          </small>
        </h2>
          <?php 
            $query = "SELECT * FROM page_detail where page = 'SERVICES' AND Name = 'services list' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>  
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
