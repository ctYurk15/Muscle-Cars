<?php

    include '../dbdata.php';
    include 'DBmanager.php';
    include 'Car.php';
    include 'User.php';
    include 'Comments.php';
    include 'generalScripts.php';

    //what user wants to get
    $action = $_POST['action'];
    $carname = $_POST['carname'];

    $commentController = new Comments($conn);
    $car = new Car($conn, $carname);

    //get all comments
    if($action == 'get_comments')
    {
        $comments = $commentController->getCommentsForCar($carname);
        echo json_encode(array(
            'comments' => $comments
        ));
    }
    //get car info
    else if($action == 'get_carinfo')
    {
        $gallery = $car->getGallery();
        $description = $car->getCarColumn("Description");
        $img = $car->getCarColumn("img");
        $manufacturer = $car->getManufacturer();
        $year = $car->getCarColumn("year");
        $score = $car->getAVGScore();
        
        echo json_encode(array(
            'description' => $description,
            'manufacturer' => $manufacturer,
            'img' => $img,
            'gallery' => $gallery,
            'score' => $score,
            'year' => $year
        ));
    }
    //add a comment
    else if($action == "leave_comment")
    {
        $commentText = $_POST["comment"];
        $positive = $_POST["positive"];
        $success = true;
        $message = "";
        
        //if user is loggined
        if(!isset($_COOKIE['login']))
        {
            $success = false;
            $message = "Ввійдіть, будь ласка, до свого аккаунта";
        }
        else
        {
            if(!empty($commentText))
            {
                $user = new User($conn, $_COOKIE["login"]);
                    
                //getting user and car id for correct insert
                $user_id = $user->getUserColumn('ID');
                $car_id = $car->getCarColumn('ID');

                $commentController->addComment($positive, $commentText, $user_id, $car_id); //adding new comment

            }
            else
            {
                $message = "Заповніть, будь ласка, усі поля";
                $success = false;
            }
        }
        
        echo json_encode(array(
            'success' => $success,
            'message' => $message
        ));
    }
?>