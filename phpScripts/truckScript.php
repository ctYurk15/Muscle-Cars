<?php
    //what user whants to do
    $cmdStr =  htmlspecialchars($_POST["action"]);
    $cmdStr = explode(',', $cmdStr);
    
    $command = $cmdStr[0]; //what user wants to do
    if($command == "purchase") //if user wants to purchase his order
    {
        
    }
    else //if he wants to change his order
    {
        $request = "UPDATE `order` SET Count = COUNT {$cmdStr[1]} 1 WHERE id={$command}";
        
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

        $result = $conn->query($request);
        //$conn->close(); //closing connection
        
        echo "Success.<script>location.replace('../truck.php')</script>"; //redirecting
    }
?>