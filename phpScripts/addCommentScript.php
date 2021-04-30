<?php

    if(isset($_COOKIE["login"]))
    {
        include '../dbdata.php';
        include 'generalScripts.php';
        include 'DBmanager.php';
        include 'Car.php';
        include 'User.php';
        include 'Comments.php';
        
        //getting comment
        $comment = htmlspecialchars($_POST['commentText']);
        $carname = htmlspecialchars($_POST['carname']);
        $positive = $_POST["positiveComment"];
        $login = $_COOKIE['login'];

        //getting user and car id for correct insert
        $user = new User($conn, $login);
        $car = new Car($conn, $carname);
        
        $user_id = $user->getUserColumn('ID');
        $car_id = $car->getCarColumn('ID');
        
        $comments = new Comments($conn);
        $comments->addComment($positive, $comment, $user_id, $car_id);
        
        gotoURL("../carpage.php?carName={$carname}"); //redirecting
    }
    else //redirecting to login page
    {
        gotoURL('../login.html');
    }

?>