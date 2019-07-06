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
    <title>CONTACTS</title>

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
            <a data-type='rd-navbar-brand'  href="./">ASIANA IMPORTS</small></a>
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
         
              <h2>
                contact 
                <small>
                 form
                </small>
              </h2>
              <form id="contact-form" class='contact-form'>
                <div class="contact-form-loader"></div>
                <fieldset>
                  <label class="name">
                    <input type="text" name="name" placeholder="Name:" value="" data-constraints="@Required @JustLetters"/>
                    <span class="empty-message">*This field is required.</span>
                    <span class="error-message">*This is not a valid name.</span>
                  </label>              
              
                  <label class="phone">
                    <input type="text" name="phone" placeholder="Phone:" value="" data-constraints="@JustNumbers"/>
              
                    <span class="empty-message">*This field is required.</span>
                    <span class="error-message">*This is not a valid phone.</span>
                  </label>

                  <label class="email">
                    <input type="text" name="email" placeholder="Email:" value="" data-constraints="@Required @Email"/>
                    
                    <span class="empty-message">*This field is required.</span>
                    <span class="error-message">*This is not a valid email.</span>
                  </label>
              
                  <label class="message">
                    <textarea name="message" placeholder="Message" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
              
                    <span class="empty-message">*This field is required.</span>
                    <span class="error-message">*The message is too short.</span>
                  </label>
              
                 <!--  <label class="recaptcha"> <span class="empty-message">*This field is required.</span> </label> -->
              
                  <div class="btn-wr text-primary">
                    <a class="btn btn-primary" href="#" data-type="submit">Submit comment</a>
                  </div>
                </fieldset>
                <div class="modal fade response-message">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          &times;
                        </button>
                        <h4 class="modal-title">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        You message has been sent! We will be in touch soon.
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              
                     
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
