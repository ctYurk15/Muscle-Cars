<?php

include_once '../vendor/autoload.php';
include_once '../dbdata.php';
use Models\Car as Car;
use Models\Manufacturer as Manufacturer;
use Models\Comments as Comments;

$topic = $_GET['topic'];
$result = [];

if($topic == 'cars')
{
    $result = Car::getAllCars(null, null, $conn);
}
else if($topic == 'comments')
{
    $result = Comments::all($conn);
}
else if($topic == 'manufacturers')
{
    $result = Manufacturer::all($conn);
}

echo json_encode($result);