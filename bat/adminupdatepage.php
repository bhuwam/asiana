<?php 
include ('connection.php');
$connection = new createConnection();
$connection->connectToDatabase();
    $page = $_POST['page'];
    $i=$_POST['i'];
    for($a=0;$a<$i;$a++){
        $id = $_POST['id'.$a];
        if($id <> 0){
            $detail = $_POST['detail'. $a];
            echo "<br/>";
            $query="UPDATE page_detail SET Detail = N'" . $detail . "'WHERE ID = " . $id;
            if(mysqli_query($connection->myconn, $query)){
                echo "Records were updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $query. " . mysqli_error($connection->myconn);
            }
        }
}
$connection->closeConnection();
header("location:../adminConsole.php?page=" . $page);
?>