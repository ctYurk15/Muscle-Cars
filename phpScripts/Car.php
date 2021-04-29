<?php

    class Car
    {
        public $conn;
        public $name;
        
        public function __construct($conn, $name)
        {
            $this->conn = $conn; 
            $this->name = $name;
        }
        
        public function getCarInfo()
        {
            $car = []; 
            $car = $this->conn->query("SELECT * FROM car WHERE name='{$this->login}'")->fetch_array();
            return $car;
        }
        
        public function getGallery()
        {
            $gallery = []; 
            $gallery = $this->conn->query(" SELECT * 
                                        FROM gallery 
                                        JOIN car ON car.ID = gallery.CarID
                                        WHERE car.name='{$this->name}'")->fetch_array();
            return $gallery;
        }
        
        public static function getAllCars($filters, $sorting, $conn)
        {
            $cars = [];
            
            $request = "SELECT DISTINCT car.name as carName, car.img AS carImg, car.ShortDescription AS carDesription
                        FROM car 
                        JOIN manufacturer ON car.ManufacturerID = manufacturer.ID 
                        JOIN options ON options.CarID = car.ID
                        {$filters} {$sorting}";
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
        
        /*public function increaseUserOrders($value)
        {
            $this->conn->query("UPDATE `user` SET orders = orders+{$value} WHERE login='{$this->login}'");
        }
        
        public function addUser($login, $name, $email, $pass)
        {
            $this->conn->query("INSERT INTO `user`(login, name, email, pass) VALUES('{$login}', '{$name}', '{$email}', '{$pass}')");
        }
        
        public function fullUserUpdate($login, $name, $email, $address, $pass)
        {
            $this->conn->query("UPDATE `user` 
                    SET login = '{$login}', 
                        name = '{$name}', 
                        address = '{$address}',
                        email = '{$email}',
                        pass = '{$pass}'
                    WHERE login='{$this->login}'");
        }*/
        
    }

?>