<?php
    include '../dbdata.php';
    include 'generalScripts.php';
    include 'Truck.php';

    //getting order values
    $carname = $_POST['carname'];
    $color = $_POST['carcolor'];
    $engine = $_POST['carengine'];
    $disk = $_POST['cardisk'];


    if($_GET['mode'] == 'purchase')
    {
        if(isset($_COOKIE['login']))
        {
            $login = $_COOKIE['login']; //getting login

            $truck = new Truck($login, $conn);
            if($truck->addOrder($carname, $color, $engine, $disk))
            {
                gotoURL('../truck.php');
            }
            else
            {
                alert('Для цього автомобіля немає таких опцій');
            }

        }
        else
        {
            gotoURL("../login.html");
        }   
    }
    elseif($_GET['mode'] == 'getPrice')
    {
        $request = " SELECT Price FROM `options` 
                     JOIN car on car.ID = options.CarID 
                     WHERE car.name = '{$carname}' AND options.Color='{$color}' AND options.Engine = '{$engine}' AND options.Disk = {$disk}";

        $result = $conn->query($request)->fetch_array();
        $price = $result['Price'];
        
        if(isset($price)) //if there is option we want to
        {
            echo "Ціна: {$price}$";
        }
        else
        {
            echo "Для цього автомобіля немає таких опцій";
        }
    }
    //INSERT INTO options(Color, `Engine`, HP, Disk, Quantity, Price, car_ID) VALUES("Red", "V8", 396, 15, 10, 45000, 1);
?>