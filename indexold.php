<?php 
include ('/bat/connection.php');
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
            <a data-type='rd-navbar-brand'  href="./">ASIANA<small>IMPORT</small></a>
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
            <?php 
            $connection = new createConnection();
            $connection->connectToDatabase();
            $loop=0;
            $query = "SELECT * FROM page_link WHERE Parent = ''";
            $result = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $loop=0;
                    $name = $row['Name'];
                    while ($loop==0){
                     
                        $query = "SELECT * FROM page_link WHERE Parent = '" . $name ."'";
                    $result1 = mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
                    if ($result1->num_rows > 0) {
            ?>  
              
                <li class="dropdown <?php if ($row['Name']=="HOME") echo "active";?>">
                <?php 
                    }else{
                        $loop=1;
                        
                ?>
                <li class="<?php if ($row['Name']=="HOME") echo "active";?>">
                <?php }?>
                  <a href="<?php echo $row['Link'];?>"><?php echo $row['Name'];?></a>
                  <?php 
                  if ($result1->num_rows > 0) {
                      ?>
                      <ul class="dropdown-menu">
                      <?php
                      while($row1 = $result1->fetch_assoc()) {
                          $name = $row1['Name'];
                  ?>
                  
                  <li>
                  	<a href="<?php echo $row1['Link'];?>"><?php echo $row1['Name'];?></a>
                  </li>
                  
                </li>
                
              <?php
                      }?>
                      
                      </ul>
                      <?php
                  }
                  
                 }
                }
                } else {
                    echo "0 results";
                }
                $connection->closeConnection();
              ?>
                <li>
                  <a href="index-1.html">ABOUT</a>
                </li>
                <li class="dropdown">
                  <a href="index-2.html">SERVICES</a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">Consultancy</a>
                      <ul class="dropdown-menu">
                          <li>
                            <a href="#">IT Services</a>
                          </li>
                          <li>
                            <a href="#">IT Support</a>
                          </li>                      
                      </ul>
                    </li>
                    <li>
                      <a href="#">Imports and Exports</a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="#">Fashion</a>
                          </li>
                          <li>
                            <a href="#">Costume</a>
                          </li>                      
                        </ul>
                    </li>
                  </ul>
                </li>               
                
                <li>
                  <a href="index-4.html">CONTACTS</a>
                </li>
                <li>
                  <a href="admin.php">LOGIN</a>
                </li>
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

      <section class="well well1 well1_ins1">
        <div class="camera_container">
          <div id="camera" class="camera_wrap">
            <div data-src="images/page-1_slide1.jpg">
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
                <img src="images/page-1_img1.jpg" alt="">
                <div class="caption bg2">
                  <h3>
                    PREMIUM SERVICES
                  </h3>
                  <div class="wrap">
                    <p>
                      Best quality solution for customer.
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>              
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="images/page-1_img2.jpg" alt="">
                <div class="caption bg3">
                  <h3>
                    GLOBAL SOLUTIONS
                  </h3>
                  <div class="wrap">
                    <p class="thumb_ins1">
                      Provides all things that customers need to succeed .
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
                <img src="images/page-1_img3.jpg" alt="">
                <div class="caption bg3">
                  <h3>
                    Expertise
                  </h3>
                  <div class="wrap">
                    <p>
                      Importing from all over the world.
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>              
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="images/page-1_img4.jpg" alt="">
                <div class="caption bg-primary">
                  <h3>
                    RESOURCES
                  </h3>
                  <div class="wrap">
                    <p>
                      Best industry service.
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>              
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="thumbnail thumb-shadow">
                <img src="images/page-1_img5.jpg" alt="">
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
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <p>Asiana Imports is a Melbourne based consulting company and is a leader in advisory, IT solutions and is also involved in a supporting educational organisations.</p>
              <p>AI works in partnership with industry experts and trade associations to gain the widest possible reach.</p>
            </div>
            <div class="col-md-6 col-sm-12">
              <p>
                 Asiana Imports can deliver you unique solutions that produce real results. Our success is built on the success of our clients. Our purpose is to help our clients achieve their vision by working as partners to deliver excellent service with the highest levels of integrity. This will continue to be the foundation of our success, today and into the future
                <a href="#" class="btn-link l-h1 fa-angle-right"></a>
              </p>
            </div>
          </div>
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
            <div class="col-md-6 col-sm-12">
              <ul class="link-list wow fadeInLeft" data-wow-duration='3s'>
                <li>

                  <a href="#">Consultancy</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
                <li>

                  <a href="#">IT Solutions</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
                <li>

                  <a href="#">Support Academic Organisations</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
              </ul>
            </div>
            <div class="col-md-6 col-sm-12">
              <img class="width_img" src="images/page-1_img6.jpg" alt="">
            </div>
          </div>
        </div>
      </section>

      <section class="well well3 parallax" data-url="images/parallax1.jpg" data-mobile="
      true" data-speed="0.9">
        <div class="container">
          <div class="wrap text-center">
            <strong>
              SAVE TIME,<br />
              SAVE MONEY,
              <small>
                GROW & SUCCEED
              </small>
            </strong>
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
            <ul class="flex-list">
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="images/page-1_img7.jpg" alt="">
                </a>  
              </li>
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="images/page-1_img8.jpg" alt="">
                </a>  
              </li>
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="images/page-1_img9.jpg" alt="">
                </a>  
              </li>
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="images/page-1_img10.jpg" alt="">
                </a>  
              </li>
            </ul>

            <ul class="flex-list">
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="images/page-1_img11.jpg" alt="">
                </a>  
              </li>
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="images/page-1_img12.jpg" alt="">
                </a>  
              </li>
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="images/page-1_img13.jpg" alt="">
                </a>  
              </li>
              <li class="col-lg-3 col-sm-3 col-xs-6">
                <a href="#">
                  <img src="images/page-1_img14.jpg" alt="">
                </a>  
              </li>
            </ul>
          </div>  
          
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
              Asiana imports online systems  &#169; <span id="copyright-year"></span>
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
