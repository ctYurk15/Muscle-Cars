<?php
    include '../dbdata.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($mysqli->connect_errno) 
    {
        printf("Failed to connect to: %s\n", $mysqli->connect_error);
        exit();
    }

    //getting registration values
    $login = $_POST['login'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];
    $agreed = $_POST['agreed'];

    $error = false;

    if($pass != $rpass) //if passwords don`t match
    {
        echo "Паролі не співпадають";
        $error = true;
    }
    
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Пошта не є коректною";
        $error = true;

    }

    if($agreed != "yes") //agree button
    {
        echo "Погодьтесь з нашими правилами";
        $error = true;
    }

    if(empty($login) || empty($name) || empty($email) || empty($pass) || empty($rpass) || empty($agreed)) //empty fields
    {
        echo "Заповніть будь ласка усі поля";
        $error = true;
    }

    //if there is already user with that login 
    $countL = $conn->query("SELECT COUNT(*) AS c FROM `user` WHERE login='{$login}'")->fetch_array()['c'];
    if($countL > 0)
    {
        echo "Уже є користувач з логіном {$login}";
        $error = true;
    }

    //if there is already user with that login 
    $countM = $conn->query("SELECT COUNT(*) AS c FROM `user` WHERE email='{$email}'")->fetch_array()['c'];
    if($countM > 0)
    {
        echo "Уже є користувач з поштою {$email}";
        $error = true;
    }


    /*if(!error) //if all were correct
    {
        $request = "INSERT INTO `user`(pass, login, name,  email) VALUES('$pass', '$login', '$name', '$email')";

        $conn->query($request);
        setcookie("login", $login, time()+(60*60*24), '/');  //setting cookie for next 1 day
        gotoURL('../account.php');
    }*/
?>