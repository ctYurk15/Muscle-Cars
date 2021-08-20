<?php

    include '../dbdata.php';
    include "../vendor/autoload.php";

    use Models\Manufacturer as Manufacturer;
    use Models\DBmanager as DBmanager;
    use Models\User as User;
    use Models\Car as Car;

    $command = $_POST['action'];

    //what user wants to get
    if($command == "get_manufacturers")
    {
        $result = Manufacturer::all($conn);
        echo json_encode($result);
    }
    else if($command == "show_cars")
    {
        //getting options
        $minPrice = intval($_POST['minPrice']) != 0 ? intval($_POST['minPrice']) : null;
        $maxPrice = intval($_POST['maxPrice']) != 0 ? intval($_POST['maxPrice']) : null;
        $minWS = intval($_POST['minWS']) != 0 ? intval($_POST['minWS']) : null;
        $maxWS = intval($_POST['maxWS']) != 0 ? intval($_POST['maxWS']) : null;
        $minHP = intval($_POST['minHP']) != 0 ? intval($_POST['minHP']) : null;
        $maxHP = intval($_POST['maxHP']) != 0 ? intval($_POST['maxHP']) : null;
        $manufacturers = $_POST['manufacturers'];
        $orderBy = $_POST['orderBy'];

        $filters = "WHERE car.id > 0 ";
        $sorting = "";

        //data validation
        if($minPrice > $maxPrice && $minPrice != null && $maxPrice != null) 
        {
            [$minPrice, $maxPrice] = [$maxPrice, $minPrice];
        }
        if($minHP > $maxHP)
        {
            [$minHP, $maxHP] = [$maxHP, $minHP];
        }
        if($minWS > $maxWS)
        {
            [$minWS, $maxWS] = [$maxWS, $minWS];
        }

        //sorting
        if($orderBy != null)
        {
            switch($orderBy)
            {
                case "price-low-high":
                    $sorting = " ORDER BY options.price";
                    break;

                case "price-high-low":
                    $sorting = " ORDER BY options.price DESC";
                    break;

                case "year-new-old":
                    $sorting = " ORDER BY car.year";
                    break;
                
                case "year-old-new":
                    $sorting = " ORDER BY car.year DESC";
                    break;

                case "name-a-z":
                    $sorting = " ORDER BY car.name";
                    break;

                case "name-z-a":
                    $sorting = " ORDER BY car.name DESC";
                    break;

                case "hp-high-low":
                    $sorting = " ORDER BY options.HP DESC";
                    break;
                
                case "hp-low-high":
                    $sorting = " ORDER BY options.HP";
                    break;
            }
        }

        //filters
        $msg = "";

        //price
        if($minPrice != null)
        {
            $filters .= " AND options.price >= {$minPrice} ";
        }
        if($maxPrice != null)
        {
            $filters .= " AND options.price <= {$maxPrice} ";
        }

        //wheels size
        if($minWS != null)
        {
            $filters .= " AND options.Disk >= {$minWS} ";
        }
        if($maxWS != null)
        {
            $filters .= " AND options.Disk <= {$maxWS} ";
        }

        //HP
        if($minHP != null)
        {
            $filters .= " AND options.HP >= {$minHP} ";
        }
        if($maxHP != null)
        {
            $filters .= " AND options.HP <= {$maxHP} ";
        }

        //manufacturers
        if($manufacturers != null)
        {
            if(count($manufacturers) > 1) //if we have multiple manufacturers
            {
                $filters .= "AND (manufacturer.Name = '{$manufacturers[0]}'";
                for($i = 1; $i < count($manufacturers); $i++)
                {
                    $filters .= " OR manufacturer.Name = '{$manufacturers[$i]}'";
                }
                $filters .= ") ";
            }
            else $filters .= "AND manufacturer.Name = '{$manufacturers[0]}'";
        }
        
        //getting final result
        $cars = Car::getAllCars($filters, $sorting, $conn);

        echo json_encode(["result" => true, "cars" => $cars, "msg" => $msg]);
    }
    else
    {
        echo json_encode("Default");
    }
?>