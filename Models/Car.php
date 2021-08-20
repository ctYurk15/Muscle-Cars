<?php

    namespace Models;

    class Car extends DBmanager
    {
        public $name;
        
        public function __construct($conn, $name)
        {
            $this->name = $name; 
            parent::__construct($conn);
        }
        
        public function getCarInfo()
        {
            $car = []; 
            $car = $this->conn->query("SELECT * FROM car WHERE name='{$this->name}'")->fetch_array();
            return $car;
        }
        
        public function getGallery()
        {
            $gallery = []; 
            $gallery = $this->conn->query(" SELECT img1, img2, img3,  img4,  img5,  img6,  img7
                                        FROM gallery 
                                        JOIN car ON car.ID = gallery.CarID
                                        WHERE car.name='{$this->name}'")->fetch_array();
            return $gallery;
        }
        
        public static function getAllCars($filters, $sorting, $conn)
        {
            $cars = [];
            
            $request = "SELECT car.name as carName, car.img AS carImg, car.ShortDescription AS carDesription, MIN(options.price) as minPrice
                        FROM car 
                        JOIN manufacturer ON car.ManufacturerID = manufacturer.ID 
                        JOIN options ON options.CarID = car.ID
                        {$filters}
                        GROUP BY options.CarID
                        {$sorting}";
            $result = $conn->query($request);
            
            //echo $request;

            while($row = $result->fetch_array()) //fetching request to array
            {
                $cars[count($cars)] = $row;
            }
            
            return $cars;
        }
        
        public function getCarColumn($columnName)
        {
            $column = ""; 
            $column = $this->conn->query("SELECT {$columnName} FROM car WHERE name='{$this->name}'")->fetch_array()[$columnName];
            return $column;
        }
        
        public function getManufacturer()
        {
            $manufacturer = "";
            $manufacturer = $this->conn->query("SELECT manufacturer.name AS mn  
                                                FROM manufacturer
                                                JOIN car ON car.ManufacturerID = manufacturer.ID
                                                WHERE car.name = '{$this->name}'")->fetch_array()['mn'];
            return $manufacturer;
        }
        
        public function getAVGScore()
        {
            //getting positive comments count
            $positiveComments = $this->conn->query("SELECT COUNT(*) AS c
                                                    FROM comment
                                                    JOIN car ON comment.CarID = car.ID
                                                    WHERE positive=1 AND car.name='{$this->name}'
                                                    ")->fetch_array()['c'];
            //getting all comments count
            $allComments = $this->conn->query("SELECT COUNT(*) AS c
                                                    FROM comment
                                                    JOIN car ON comment.CarID = car.ID
                                                    WHERE  car.name='{$this->name}'
                                                    ")->fetch_array()['c'];
            
            if($allComments > 0) //if there is comments
            {
                return round(($positiveComments/$allComments), 2)*100;
            }
            else return -1;
        }
        
    }

?>