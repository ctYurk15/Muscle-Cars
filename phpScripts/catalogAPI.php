<?php

    include '../dbdata.php';
    include 'DBmanager.php';
    include 'User.php';
    include 'Manufacturer.php';

    $command = $_POST['action'];

    //what user wants to get
    if($command == "get_manufacturers")
    {
        $result = Manufacturer::all($conn);
        echo json_encode($result);
    }
?>