<?php
include ('/bat/connection.php');
$connection = new createConnection();
$connection->connectToDatabase();
$query = "SELECT * FROM page_detail where page = 'HOME'";
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
    <title>HOME</title>

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

      <section class="well well1 well1_ins1">
        <div class="camera_container">
          <div id="camera" class="camera_wrap">
                      <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'Header' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
            ?>
            <div data-src="<?php echo $row["Detail"];}?>">
              <div class="camera_caption fadeIn">
                <div class="jumbotron jumbotron1">
                  <em>
                    SUCCESS
                  </em>
                  <div class="wrap">
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>
            </div>
            <div data-src="images/page-1_slide2.jpg">
              <div class="camera_caption fadeIn">
                <div class="jumbotron jumbotron2">
                  <em>
                    quality
                  </em>
                  <div class="wrap">
                    <a href="#" class="btn-link hov_prime fa-angle-right"></a>
                  </div>  
                </div>
              </div>
            </div>
            <div data-src="images/page-1_slide3.jpg">
              <div class="camera_caption fadeIn">
                <div class="jumbotron">
                  <em>
                    SOLUTIONS
                  </em>
                  <div class="wrap">
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container center991">
          <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
              <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'premium service' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
            ?>
                <img src="<?php echo $row["Detail"];}?>" alt="">
                <div class="caption bg2">
                  <h3>
                    PREMIUM SERVICES
                  </h3>
                  <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'premium service' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
            ?>
                  <div class="wrap">
                    <p>
                      <?php echo $row["Detail"];}?>
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>              
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
              <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'global solution' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
            ?>
                <img src="<?php echo $row["Detail"];}?>" alt="">
                <div class="caption bg3">
                  <h3>
                    GLOBAL SOLUTIONS
                  </h3>
                  <div class="wrap">
                    <p class="thumb_ins1">
                    <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'global solution' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>
                     
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div> 
            </div>
          </div>

          <div class="row wow fadeIn" data-wow-duration='2s'>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
              <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'expertise' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
               
            ?>
                <img src="<?php echo $row["Detail"];}   ?> " alt="">
                <div class="caption bg3">
                  <h3>
                    Expertise
                  </h3>
                  <div class="wrap">
                    <p>
                     <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'expertise' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>              
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
              <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'resources' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>
                <img src="<?php echo $row["Detail"];}?>" alt="">
                <div class="caption bg-primary">
                  <h3>
                    RESOURCES
                  </h3>
                  <div class="wrap">
                    <p>
                    <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'resources' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>              
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
              <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'research' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                
            ?>
                <img src="<?php echo $row["Detail"];}?>" alt="">
                <div class="caption bg2">
                  <h3>
                    RESEARCH
                  </h3>
                  <div class="wrap">
                    <p>
                     
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>              
            </div>
          </div>
        </div>        
      </section>
      
      <section class="well well2 wow fadeIn  bg1" data-wow-duration='3s'>
        <div class="container">
        <h2 class="txt-pr">
        wELCOME
          <small>
            TO ASIANA!
          </small>
        </h2>
        <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'welcome' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>
        </div>
      </section>

      <section class="well well2">
        <div class="container">
        <h2>
          our
          <small>
            SERVICES
          </small>
        </h2>
        
          <div class="row offs1">
            <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'our services' AND Picture = 0";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                echo $row["Detail"];}
            ?>
            <div class="col-md-6 col-sm-12">
            <?php 
            $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'our services' AND Picture = 1";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
            ?>
              <img class="width_img" src="<?php echo $row["Detail"];}?>">
            </div>
          </div>
        </div>
      </section>
			<?php 
                $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'Footer' AND Picture = 1";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
            ?>
      <section class="well well3 parallax" data-url="<?php echo $row["Detail"];}?>" data-mobile="
      true" data-speed="0.9">
        <div class="container">
          <div class="wrap text-center">
          <?php 
                $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'Footer' AND Picture = 0";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo $row["Detail"];}
            ?>
            
            <a href="#" class="btn btn-primary">read more <span class="fa-angle-right"></span></a>
          </div>  
        </div>        
      </section>

      <section class="well well2">
        <div class="container">
          <h2>
            our 
            <small>
              clients
            </small>
          </h2>

          <div class="row offs1">
          <?php 
                $query = "SELECT * FROM page_detail where page = 'HOME' AND Name = 'our client' AND Picture = 1";
                $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                if ($result->num_rows > 0) {
                    // output data of each row
                    $i = 0;
                    $n = 4;
                    while ($row = $result->fetch_assoc()){
                        if (($i % $n) == 0){
            ?>
            		<ul class="flex-list">
            <?php }?>
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="<?php echo $row["Detail"];?>" alt="">
                </a>  
              </li>
			<?php
			             if (($i % $n) == 0 AND $i <> $n AND $i <> 0){
			?>
            </ul>
			<?php }
			     $i++;
                    }
                        }?>
          </div>  
          
        </div>
      </section>

    </main>
<?php $connection->closeConnection();?>
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
