<?php
    
    include '../dbdata.php';
    include 'generalScripts.php';
    include 'User.php';
    
    //getting login values
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $user = new User($conn);
    $info = $user->getUserByLogin($login); 

    if(empty($info)) //checking is there is user with such login
    {
        echo "Немає користувачів з таким логіном!";
        exit();
    }

    if($info['pass'] != $pass) //if password wasn`t correct
    {
        echo "Неправильний пароль!";
        exit();
    }

    createCookie("login", $login, (60*60*24), '../account.php');
?>