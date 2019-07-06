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
                $menu .="<a href='?page=".$row['Name']."'>".$row['Name']." <span class='glyphicon glyphicon-menu-down' aria-hidden='true'></span></a>";
                $menu .= "<ul class='dropdown-menu'>".get_menu_tree($row['Name'])."</ul>";
                $menu .= "</li>";
            }
            else{
                $menu .="<li><a href='?page=".$row['Name']."'>".$row['Name']."</a>";
                
                $menu .= "<ul>".get_menu_tree($row['Name'])."</ul>"; //call  recursively
                
                $menu .= "</li>";
            }
        }
        else{
            $sqlquery = " SELECT * FROM page_link where Parent='" . $row['Name'] . "'";
            $res1=mysqli_query($connection->myconn, $sqlquery) or die(mysqli_error($connection->myconn));
            if ($res1->num_rows > 0) {
                $menu .="<li><a href='?page=".$row['Name']."'>".$row['Name']."</a>";
                
                $menu .= "<ul class='dropdown-menu'>".get_menu_tree($row['Name'])."</ul>"; //call  recursively
                
                $menu .= "</li>";
            }
            else
            {
                $menu .="<li><a href='?page=".$row['Name']."'>".$row['Name']."</a>";
                
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

    <form id="admin-form" class='admin-form' method="POST" action="bat/pageupdate.php">
                <div class="admin-form-loader"></div>
<?php
$page = "";
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page = 'HOME';
}
    
$i = 0;
$query = "SELECT DISTINCT * FROM page_link WHERE Name='" . $page . "'";
$result = mysqli_query($connection->myconn, "$query") or die(mysqli_error($connection->myconn));
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
                <h2><small><?php echo $row["Name"]; ?>  </small></h2>
              
                <fieldset>
	<label class="message">
                Detail<textarea name="detail<?php echo $i;?>"  data-constraints="@Required @Length(min=1,max=999999)"><?php echo $row["Link"] ;$i++;  ?></textarea>
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
    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer class="top-border">

    
     

    <section class="well1">
      <div class="container"> 
            <p class="rights">
              Asiana imports PTY. LTD &#169; <span id="copyright-year"></span>
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
