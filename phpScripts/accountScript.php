<?php
    //getting new data
    $newlogin = htmlspecialchars($_POST['login']);
    $newname = htmlspecialchars($_POST['name']);
    $newemail = htmlspecialchars($_POST['email']);
    $newaddress = htmlspecialchars($_POST['address']);
    $newpass = htmlspecialchars($_POST['pass']);
    $newavatar = $_FILES['avatar']['name'];

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

    $request = "UPDATE user
                SET login='{$newlogin}',
                    name='{$newname}',
                    email='{$newemail}',
                    address='{$newaddress}',
                    pass='{$newpass}'
                    WHERE login='{$_COOKIE['login']}'";
    $conn->query($request); //making request
    //echo $_COOKIE['login'];

    setcookie('login', '0', time()-10, "/"); //unsetting previous cookie
    setcookie('login', $newlogin, time()+(60*60*24), "/"); //setting cookie with new login
    //echo $request;
    echo "Success.<script>location.replace('../account.php')</script>"; //redirecting
?>