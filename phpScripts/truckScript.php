<?php
    include '../dbdata.php';
    include 'generalScripts.php';
    include 'User.php';
    include 'Truck.php';

    $truck = new Truck($_COOKIE['login'], $conn);

    //what user whants to do
    $cmdStr =  htmlspecialchars($_POST["action"]);
    $cmdStr = explode(',', $cmdStr);
    
    $command = $cmdStr[0]; //what user wants to do
    $sign = $cmdStr[1]; //sign

    if($command == "purchase") //if user wants to purchase his order
    {
        //to avoid bugs with NULL address
        $user = new User($conn, $_COOKIE['login']);
        if($user->getUserColumn("address") == "") 
        {
            alert('Вкажіть будь-ласка свою адресу у аккаунті');
            gotoURL('../account.php');  
        }
        else
        {
            $truck->purchaseOrders();

            echo "<script>
                    //alert('Count: {$totalCount}; Price: {$totalPrice}');
                    location.replace('../thanks.html');
                 </script>";
        }
        
        
    }
    else //if he wants to change his order
    {
        $truck->changeOrder($command, $sign);
        gotoURL("../truck.php");
    }
?>