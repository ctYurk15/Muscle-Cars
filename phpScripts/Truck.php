<?php
    class Truck
    {
        public $currentUser;
        public $conn;
        
        public function __construct($currentUser, $conn)
        {
            $this->currentUser = $currentUser;
            $this->conn = $conn;
        }
        
        public function addOrder()
        {
            
        }
        
        public function redactOrder()
        {
            
        }
        
        public function deleteOrder()
        {
            
        }
        
        public function getOrders()
        {
            
            $orders = [];
            $request = "SELECT car.name AS carName, car.year, manufacturer.name AS manufacturerName, car.img, `options`.HP,                                          `options`.disk, `options`.Color, `options`.price, `order`.Count, `order`.ID AS orderID
                        FROM `order` 
                        JOIN `options` ON `options`.ID = OptionID 
                        JOIN car ON car.ID = `options`.CarID
                        JOIN `user` ON `user`.ID = UserID 
                        JOIN manufacturer ON manufacturer.ID = car.ManufacturerID 
                        WHERE `user`.login = '{$this->currentUser}'";
            $result = $this->conn->query($request);
            while($row = $result->fetch_array())
            {
                $orders[count($orders)] = $row; //adding orders to array
            }
            return $orders;
        }
    }
?>