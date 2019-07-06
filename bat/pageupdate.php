<?php 
include ('connection.php');
$connection = new createConnection();
$connection->connectToDatabase();
    $page = $_POST['page'];
    $i=$_POST['i'];
    for($a=0;$a<$i;$a++){
        
            $detail = $_POST['detail'. $a];
            echo "<br/>";
            $query="UPDATE page_link SET Link = N'" . $detail . "'WHERE Name = '" . $page . "'";
            if(mysqli_query($connection->myconn, $query)){
                echo "Records were updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $query. " . mysqli_error($connection->myconn);
            }
        
}
$connection->closeConnection();
header("location:../updatepage.php?page=" . $page);
?>