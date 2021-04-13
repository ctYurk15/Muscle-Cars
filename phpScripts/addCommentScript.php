<?php
    
    if(isset($_COOKIE["login"]))
    {
        //getting comment
        $comment = htmlspecialchars($_POST['commentText']);
        $carname = htmlspecialchars($_POST['carname']);
        $positive = $_POST["positiveComment"];
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
        
        //did we already left comment?
        $getUserIDRequest = "SELECT COUNT(*) AS c FROM comment WHERE UserID=$user_id AND CarID=$car_id"; //user
        $count = $conn->query($getUserIDRequest)->fetch_array()['c'];

        $request = "";
        
        if($count != 0) //rewriting comment
        {
            $request = "DELETE FROM `comment` WHERE UserID=$user_id AND CarID=$car_id; ";
            $conn->query($request); //deleting previous comment
        }
        
        $request = "INSERT INTO `comment`(positive, commentText, UserID, CarID) VALUES($positive, '$comment', $user_id, $car_id);";
        $conn->query($request); //inserting new comment
        
        echo "Success. Redirecting to car page.
            <script>location.replace('../carpage.php?carName=$carname')</script>"; //redirecting
    }
    else
    {
        echo "<script>location.replace('../login.html')</script>";
    }

?>