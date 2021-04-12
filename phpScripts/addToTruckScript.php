<?php
    if(isset($_COOKIE['login']))
    {
        //getting values
        $carname = $_POST['carname'];
        $login = $_COOKIE['login'];

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

        //getting user and car id for correct insert
        $getUserIDRequest = "SELECT ID FROM user WHERE login='".$login."'"; //user
        $user_id = $conn->query($getUserIDRequest)->fetch_array()['ID'];

        $getCarIDRequest = "SELECT ID FROM car WHERE name='".$carname."'"; //user
        $car_id = $conn->query($getCarIDRequest)->fetch_array()['ID'];

        $request = "INSERT INTO `order`(car_ID, user_ID, Count) VALUES($car_id, $user_id, 1);";
        $conn->query($request);

        echo "Success. Redirecting to truck page.
            <script>location.replace('../truck.php')</script>";
    }
?>