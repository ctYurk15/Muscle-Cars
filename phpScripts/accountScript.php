<?php

    include '../dbdata.php';
    include 'DBmanager.php';
    include 'User.php';
    include 'generalScripts.php';
    
    //getting new text data
    $newlogin = htmlspecialchars($_POST['login']);
    $newname = htmlspecialchars($_POST['name']);
    $newemail = htmlspecialchars($_POST['email']);
    $newaddress = htmlspecialchars($_POST['address']);
    $newpass = htmlspecialchars($_POST['pass']);
    

    //getting new avatar
    $newavatar = "account.png"; //default value

    if($_FILES['filename']['size'] > 3*1024*1024) //3 mb max
    {
        alert("File is greater than 3 mb");
    }

    if(move_uploaded_file($_FILES['filename']['tmp_name'], __DIR__.'\\..\\images\\'.$_FILES['filename']['name'])) //downloads file where we want to
    {
        echo "File uploaded successfuly<br>";
        $newavatar = $_FILES['filename']['name'];
    }
    else
    {
        if(isset($_FILES['filename']) && $_FILES['filename']['tmp_name'] != "")
        {
            alert("File upload problems");
            //echo $_FILES['filename']['tmp_name'];
        }
    }

    $user = new User($conn, $_COOKIE['login']);
    $user->fullUserUpdate($newlogin, $newname, $newemail, $newaddress, $newpass, $newavatar);

    setcookie('login', '0', time()-10, "/"); //unsetting previous cookie
    setcookie('login', $newlogin, time()+(60*60*24), "/"); //setting cookie with new login

    gotoURL('../account.php'); //redirecting
?>