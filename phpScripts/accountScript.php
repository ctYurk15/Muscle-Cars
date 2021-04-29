<?php

    include '../dbdata.php';
    include 'User.php';
    include 'generalScripts.php';
    
    //getting new data
    $newlogin = htmlspecialchars($_POST['login']);
    $newname = htmlspecialchars($_POST['name']);
    $newemail = htmlspecialchars($_POST['email']);
    $newaddress = htmlspecialchars($_POST['address']);
    $newpass = htmlspecialchars($_POST['pass']);
    $newavatar = $_FILES['avatar']['name'];

    $user = new User($conn, $_COOKIE['login']);
    $user->fullUserUpdate($newlogin, $newname, $newemail, $newaddress, $newpass);

    setcookie('login', '0', time()-10, "/"); //unsetting previous cookie
    setcookie('login', $newlogin, time()+(60*60*24), "/"); //setting cookie with new login
    gotoURL('../account.php'); //redirecting
?>