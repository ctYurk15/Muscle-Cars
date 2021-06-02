<?php
    include '../dbdata.php';
    include 'generalScripts.php';
    include 'DBmanager.php';
    include 'User.php';
    include 'Truck.php';

    $truck = new Truck($_COOKIE['login'], $conn);

    //what user whants to do
    $cmdStr =  htmlspecialchars($_POST["action"]);
    $cmdStr = explode(',', $cmdStr);
    
    $command = $cmdStr[0]; //what user wants to do
    $sign = $cmdStr[1]; //sign

    if(!empty($command) || !empty($sign))
    {
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
                gotoURL('../thanks.html');
            }


        }
        else //if he wants to change his order
        {
            $truck->changeOrder($command, $sign);
        }
    }

    //updating truck
    $orders = $truck->getOrders();

    for($i = 0; $i < count($orders); $i++)
    {
        echo " 
            <div class='truckItem'>
                <table width='100%'>
                    <tr>
                        <td width='25%' rowspan='2'>
                            <a href='carpage.html?carName={$orders[$i]["carName"]}'><img src='images/{$orders[$i]["img"]}' style='width: 100%' class='carIcon'></a>
                        </td>
                        <td width='50%' colspan='3'>
                            <h3>{$orders[$i]["manufacturerName"]} {$orders[$i]["carName"]} {$orders[$i]["year"]}</h3>
                        </td>
                        <td width='25%' align='center'>
                            $<i id='priceText{$i}' name='priceText'>{$orders[$i]["price"]}</i>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td >{$orders[$i]["HP"]}</td>
                        <td>{$orders[$i]["disk"]}`</td>
                        <td>{$orders[$i]["Color"]}</td>
                        <td>

                                <button class='countButton' onclick='updateSumPrice()' value='{$orders[$i]["orderID"]},+' name='action'>+</button>
                                <i id='count{$i}'>{$orders[$i]["Count"]}</i>
                                <button class='countButton' onclick='updateSumPrice()' value='{$orders[$i]["orderID"]},-' name='action'>-</button>

                        </td>
                    </tr>
                </table>
            </div>
        ";
    }
    if($i != 0) 
    {
        echo "<h3 style='text-align: right; margin: 20px;' id='sumPrice'>Загалом: 90000$</h3>
            <button id='makeOrder' name='action' value='purchase'>Оформити замовлення</button><br>";
    }
    else
    {
        echo "<h3>Наразі вантажівка пуста</h3>";
    }
?>