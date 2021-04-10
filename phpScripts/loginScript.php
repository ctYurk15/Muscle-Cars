<?php
    //getting registration values
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    //variables using for connection to db
    $servername = "localhost";
    $database = "muscle-carsdb";
    $username = "root";
    $password = "root";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($mysqli->connect_error) 
    {
        printf("Failed to connect to: %s\n", $mysqli->connect_error);
        exit();
    }
                    
    $result = $conn->query("SELECT COUNT(*) AS c, pass FROM user WHERE login='$login'");
    $result = $result->fetch_array();

    if($result['c'] == 0) //checking is there is user with such login
    {
        echo "<script>alert('There`s no user with login ".$login."'); location.replace('../login.html')</script>";
    }
    else
    {
        if($result['pass'] != $pass) //if password wasn`t correct
        {
            echo "<script>alert('Incorrect password!'); location.replace('../login.html')</script>";
        }
        else 
        {
            setcookie("login", $login, time()+(60*60*24), '/');  //setting cookie for next 1 day
            echo "<script>location.replace('../account.php')</script>"; //redirecting to account page
        }
    }
    
?>