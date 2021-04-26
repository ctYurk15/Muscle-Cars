<?php
    
    include '../dbdata.php';
    include 'generalScripts.php';
    
    //getting login values
    $login = $_POST['login'];
    $pass = $_POST['pass'];

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
        echo "Немає користувачів з таким логіном!";
    }
    else
    {
        if($result['pass'] != $pass) //if password wasn`t correct
        {
            echo "Неправильний пароль!";
        }
        else 
        {
            setcookie("login", $login, time()+(60*60*24), '/');  //setting cookie for next 1 day
            gotoURL('../account.php'); //redirecting to account page
        }
    }
    
?>