<?php
    include '../dbdata.php';

    //what user whants to do
    $cmdStr =  htmlspecialchars($_POST["action"]);
    $cmdStr = explode(',', $cmdStr);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($mysqli->connect_errno) 
    {
        printf("Failed to connect to: %s\n", $mysqli->connect_error);
        exit();
    }
    
    $command = $cmdStr[0]; //what user wants to do
    if($command == "purchase") //if user wants to purchase his order
    {
        //to avoid bugs with NULL address
        $addressSet = $conn->query("SELECT address FROM user WHERE login = '{$_COOKIE['login']}'")->fetch_array()["address"];
        if($addressSet == "") 
        {
            echo "<script>
                    alert('Вкажіть будь-ласка свою адресу у аккаунті');
                    location.replace('../account.php');
                  </script>";    
        }
        else
        {
            class Order //we can store here main info needed
            {
                public $id;
                public $optionsID;
                public $orderCount;
                public $optionsPrice;

                public function __construct($id, $optionsID, $count, $optionsPrice)
                {
                    $this->id = $id;
                    $this->optionsID = $optionsID;
                    $this->orderCount = $count;
                    $this->optionsPrice= $optionsPrice;
                }

                public function getID()
                {
                    return $this->id;
                }
            }

            //making request
            $request = "SELECT `order`.ID AS orderID, options.ID AS optionsID, `order`.Count AS orderCount, options.price AS optionsPrice
                        FROM `order`
                        JOIN options on `order`.OptionID = options.ID";
            $result = $conn->query($request);

            $orders = [];
            $totalCount = 0; 
            $totalPrice = 0;

            while($row = $result->fetch_array())
            {
                $orders[count($orders)] = new Order($row['orderID'], $row["optionsID"], $row["orderCount"], $row["optionsPrice"]); //filling array with main info
                $totalCount += $row["orderCount"];
                $totalPrice += $row["orderCount"] * $row['optionsPrice'];
            }

            //changing database
            for($i = 0; $i < count($orders); $i++)
            {
                $conn->query("UPDATE user SET orders = orders + {$orders[$i]->orderCount} WHERE login='{$_COOKIE['login']}'"); //adding to user stats
                $conn->query("UPDATE options SET Quantity = Quantity - {$orders[$i]->orderCount} WHERE ID = {$orders[$i]->optionsID}"); //reducing optins quantity   
                $conn->query("DELETE FROM `order` WHERE ID = {$orders[$i]->id}"); //reducing optins quantity  
            }

            echo "<script>
                    //alert('Count: {$totalCount}; Price: {$totalPrice}');
                    location.replace('../thanks.html');
                 </script>";
        }
        
        
    }
    else //if he wants to change his order
    {
        //if next value will be zero
        $getOrderInfo = "SELECT `order`.Count AS orderCount, options.Quantity AS optionsQuantity 
                        FROM `order` 
                        JOIN options ON options.ID = `order`.OptionID
                        WHERE `order`.id={$command}"; 
        $ordersInfo = $conn->query($getOrderInfo)->fetch_array();
        $countOrder = $ordersInfo['orderCount'];
        $countOptions = $ordersInfo['optionsQuantity'];
        
        if($cmdStr[1] == '-' && $countOrder == 1) //if we want to delete order from truck
        {
            //deleting order
            $request = "DELETE FROM `order` WHERE id={$command}";
            $conn->query($request);
            echo "Success.<script>location.replace('../truck.php')</script>"; //redirecting
        }
        else
        {
            //echo 0 + "1+1";
            if($countOptions > $countOrder || $cmdStr[1] == '-') //checking if we have enough quantity of this option
            {
                $request = "UPDATE `order` SET Count = COUNT {$cmdStr[1]} 1 WHERE id={$command}"; //changing order
                $conn->query($request);
                
            }
            else
            {
                echo "<script>alert('Вибачте, це все, що у нас є')</script>";
            }
            echo "Success.<script>location.replace('../truck.php')</script>"; //redirecting
        }
    }
?>