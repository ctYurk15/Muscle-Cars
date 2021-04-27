<?php
    //variables using for connection to db
    $servername = "localhost";
    $database = "muscle-carsdb";
    $username = "root";
    $password = "root";

    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($mysqli->connect_errno) 
    {
        printf("Failed to connect to: %s\n", $mysqli->connect_error);
        exit();
    }
?>