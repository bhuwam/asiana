<?php

class createConnection //create a class for make connection
{
    var $host="localhost";
    var $username="root";    // specify the sever details for mysql
    Var $password="";
    var $database="asiana";
    var $myconn;

    function connectToDatabase() // create a function for connect database
    {

        $conn= new mysqli($this->host,$this->username,$this->password,$this->database);

        if(!$conn)// testing the connection
        {
            die ("Cannot connect to the database");
        }

        else
        {

            $this->myconn = $conn;

        }

        return $this->myconn;

    }


    function closeConnection() // close the connection
    {
        mysqli_close($this->myconn);

    }

}

?>