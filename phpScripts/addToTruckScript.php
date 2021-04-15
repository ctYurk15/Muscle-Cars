<?php
    if(isset($_COOKIE['login']))
    {
        //getting order values
        $carname = $_POST['carname'];
        $color = $_POST['carcolor'];
        $engine = $_POST['carengine'];
        $disk = $_POST['cardisk'];
        
        $login = $_COOKIE['login']; //getting login
        //echo $carname." ".$color." ".$engine." ".$disk;

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

        //getting user id, car id, options info for correct insert
        $getUserIDRequest = "SELECT ID FROM user WHERE login='".$login."'"; //user
        $user_id = $conn->query($getUserIDRequest)->fetch_array()['ID'];

        $getCarIDRequest = "SELECT ID FROM car WHERE name='".$carname."'"; //car
        $car_id = $conn->query($getCarIDRequest)->fetch_array()['ID'];
        
        $getOptionRequest = "SELECT COUNT(*) AS c, ID FROM options WHERE CarID = ".$car_id." AND Color = '{$color}' AND Engine = '{$engine}' AND Disk='{$disk}'"; //getting all options for this car
        $optionsInfo = $conn->query($getOptionRequest)->fetch_array();
        $count = $optionsInfo['c'];
        
        if($count != 0) //it there is options with needed parameters
        {
            $request = "INSERT INTO `order`(OptionID, UserID, Count) VALUES({$optionsInfo['ID']}, $user_id, 1);";
            $conn->query($request);
            //echo $request;
            echo "Success. Redirecting to truck page. <script>location.replace('../truck.php')</script>";
        }
        else
        {
            echo "<script>alert('There`s no options with this parameters for this car.'); location.replace('../carpage.php?carName=$carname')</script>";
        }
        
        

        /**/
    }
    else
    {
        echo "<script>location.replace('../login.html')</script>";
    }   

    //INSERT INTO options(Color, `Engine`, HP, Disk, Quantity, Price, car_ID) VALUES("Red", "V8", 396, 15, 10, 45000, 1);
?>