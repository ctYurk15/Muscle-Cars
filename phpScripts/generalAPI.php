<?php

    $command = $_POST['action'];

    if($command == "is_loggined")
    {
        echo json_encode(isset($_COOKIE['login']));
    }
    
?>