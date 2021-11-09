<?php

include_once '../vendor/autoload.php';
include_once '../dbdata.php';
use Models\Car as Car;
use Models\Manufacturer as Manufacturer;
use Models\Comments as Comments;

$topic = $_GET['topic'];
$search_column = $_GET['search_column'];
$search_value = $_GET['search_value'];
$result = [];

//if user specified some filters
$search_rule = null;
if($search_column != null && $search_value != null)
{
    $search_rule = '`'.$search_column.'` = '.$search_value;
}

//getting records
if($topic == 'cars')
{
    $result = Car::all($conn, $search_rule);
}
else if($topic == 'comments')
{
    $result = Comments::all($conn, $search_rule);
}
else if($topic == 'manufacturers')
{
    $result = Manufacturer::all($conn, $search_rule);
}

//deleting numeric columns
foreach($result as $key => $record)
{
    foreach($record as $index => $value)
    {
        if(is_numeric($index))
        {
            unset($result[$key][$index]);
        }
    }
}

echo json_encode($result);