<?php
    //getting registration values
    $login = $_POST['login'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $request = "INSERT INTO `user`(pass, login, name,  email) VALUES('$pass', '$login', '$name', '$email')";

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
                    
    $conn->query($request);
    setcookie("login", $login, time()+(60*60*24), '/');  //setting cookie for next 1 day
    echo "Registration was successful. Redirecting to account page.
        <script>location.replace('../account.php')</script>";
?>