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
        
        public function addOrder($carname, $color, $engine, $disk)
        {
            //getting user id, car id, options info for correct insert
            $getUserIDRequest = "SELECT ID FROM user WHERE login='".$this->currentUser."'"; //user
            $user_id = $this->conn->query($getUserIDRequest)->fetch_array()['ID'];

            $getCarIDRequest = "SELECT ID FROM car WHERE name='".$carname."'"; //car
            $car_id = $this->conn->query($getCarIDRequest)->fetch_array()['ID'];

            $getOptionRequest = "SELECT COUNT(*) AS c, ID FROM options WHERE CarID = ".$car_id." AND Color = '{$color}' AND Engine = '{$engine}' AND Disk='{$disk}'"; //getting all options for this car
            $optionsInfo = $this->conn->query($getOptionRequest)->fetch_array();
            
            $optionsCount = $optionsInfo['c'];
            $optionsID = $optionsInfo['ID'];
            
            if($optionsCount != 0) //it there is options with needed parameters
            {
                //is there already this order
                $getOrderCountRequest = "SELECT COUNT(*) AS c, ID FROM `order` WHERE OptionID = {$optionsID} AND UserID = {$user_id}"; 
                echo $getOrderCountRequest;
                $ordersInfo = $this->conn->query($getOrderCountRequest)->fetch_array();
                
                $countOrders = $ordersInfo['c'];
                $orderID = $ordersInfo['ID'];

                $request = "";
                if($countOrders == 0) //creating new order
                {
                    $this->conn->query("INSERT INTO `order`(OptionID, UserID, Count) VALUES({$optionsID}, $user_id, 1);");
                }
                else //increasing existing
                {
                    $this->redactOrder($orderID, '+', 1);
                }


                $this->conn->query($request);
                return true;
            }
            else
            {
                return false;
            }
        }
        
        public function changeOrder($idOrder, $sign)
        {
            //getting info what should we do
            $getOrderInfo = "SELECT `order`.Count AS orderCount, options.Quantity AS optionsQuantity 
                        FROM `order` 
                        JOIN options ON options.ID = `order`.OptionID
                        WHERE `order`.id={$idOrder}"; 
            $ordersInfo = $this->conn->query($getOrderInfo)->fetch_array();
            
            //getting count info we need
            $orderCount = $ordersInfo['orderCount'];
            $optionsCount = $ordersInfo['optionsQuantity'];
            
            //what we should do with order
            if($sign == '-' && $orderCount == 1) //if we want to delete order from truck (1-1 = 0, we can`t have 0 cars in truck, so we delete order)
            {
                $this->deleteOrder($idOrder);
            }
            else //increase or decrease quantity
            {
                if($optionsCount > $orderCount || $sign == '-') //checking if we have enough quantity of this option
                {
                    $this->redactOrder($idOrder, $sign, 1);
                }
                else
                {
                    alert('Вибачте, це все, що у нас є');
                }
            }
        }
        
        public function redactOrder($idOrder, $sign, $value) 
        {
            $request = "UPDATE `order` SET Count = COUNT {$sign} {$value} WHERE id={$idOrder}";
            $this->conn->query($request);
        }
        
        public function deleteOrder($idOrder)
        {
            $request = "DELETE FROM `order` WHERE id={$idOrder}";
            $this->conn->query($request);
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
        
        public function purchaseOrders()
        {
            //making request
            $request = "SELECT `order`.ID AS orderID, options.ID AS optionsID, `order`.Count AS orderCount, options.price AS optionsPrice
                        FROM `order`
                        JOIN options on `order`.OptionID = options.ID";
            $result = $this->conn->query($request);

            $orders = [];
            $totalCount = 0; 
            $totalPrice = 0;

            while($row = $result->fetch_array())
            {
                 //filling array with main info
                $orders[count($orders)] = [ 
                    "optionsID" => $row["optionsID"], 
                    "orderCount" => $row["orderCount"],
                    "orderID" => $row["orderID"]
                ];
                
                //total price and count for statistics
                $totalCount += $row["orderCount"];
                $totalPrice += $row["orderCount"] * $row['optionsPrice'];
            }
                   
            $user = new User($this->conn); //for stats
            
            //changing database
            for($i = 0; $i < count($orders); $i++)
            {
                //adding to user stats
                $user->increaseUserOrders($this->currentUser, $orders[$i]["orderCount"]);
                //reducing optins quantity  
                $this->conn->query("UPDATE options SET Quantity = Quantity - {$orders[$i]["orderCount"]} WHERE ID = {$orders[$i]["optionsID"]}");  
                //deleting order
                $this->deleteOrder($orders[$i]["orderID"]);  
            }
        }
    }

    
?>