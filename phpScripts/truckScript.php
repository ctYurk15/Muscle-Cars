<?php
    //what user whants to do
    $cmdStr =  htmlspecialchars($_POST["action"]);
    $cmdStr = explode(',', $cmdStr);

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
    
    $command = $cmdStr[0]; //what user wants to do
    if($command == "purchase") //if user wants to purchase his order
    {
        
    }
    else //if he wants to change his order
    {
        //if next value will be zero
        $getOrderCount = "SELECT Count FROM `order` WHERE id={$command}"; 
        $ordersInfo = $conn->query($getOrderCount)->fetch_array();
        $countOrders = $ordersInfo['Count'];
        
        if($cmdStr[1] == '-' && $countOrders == 1) //if we want to delete order from truck
        {
            //deleting order
            $request = "DELETE FROM `order` WHERE id={$command}";
            $conn->query($request);
            echo "Success.<script>location.replace('../truck.php')</script>"; //redirecting
        }
        else
        {
            $request = "UPDATE `order` SET Count = COUNT {$cmdStr[1]} 1 WHERE id={$command}"; //changing order
            $conn->query($request);
            echo "Success.<script>location.replace('../truck.php')</script>"; //redirecting
        }
    }
?>