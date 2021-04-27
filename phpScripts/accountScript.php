<?php

    include '../dbdata.php';
    
    //getting new data
    $newlogin = htmlspecialchars($_POST['login']);
    $newname = htmlspecialchars($_POST['name']);
    $newemail = htmlspecialchars($_POST['email']);
    $newaddress = htmlspecialchars($_POST['address']);
    $newpass = htmlspecialchars($_POST['pass']);
    $newavatar = $_FILES['avatar']['name'];

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
    echo "Success.<script>location.replace('../account.php')</script>"; //redirecting
?>