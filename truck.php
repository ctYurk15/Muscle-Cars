<?php
    if(!isset($_COOKIE["login"])) //if we`re not logged redirecting to login page
    {
        header('location: login.html');
    }

    include 'dbdata.php';
    include 'phpScripts/Truck.php';
    include 'phpScripts/DBmanager.php';
?>

<!DOCTYPE html>
<html lang="en">
   
    <head>
        <meta charset="UTF-8">
        <title>Muscle cars shop - вантажівка</title>
        <link href="styles/main.css" rel="stylesheet">
        <link href="styles/truck.css" rel="stylesheet">
    </head>
    
    <body>
        <table border="0px" width="100%" class="header-table">
            <tr id="headerTR">
                <hr>
            </tr>
            <tr>
                <td colspan="7">
                    <hr>
                    
                </td>
            </tr>
            <tr>
                <td colspan="7" align="center">
                    <h1>Моя вантажівка</h1>
                    
                        <?php
                    
                            echo "<div id='truckDiv'>
                                    <form method='post' action='phpScripts/truckScript.php'>";
                            $goodsCount = 0;
                            
                            $truck = new Truck($_COOKIE['login'], $conn);
                            $orders = $truck->getOrders();
                            
                            for($i = 0; $i < count($orders); $i++)
                            {
                                echo " 
                                    <div class='truckItem'>
                                        <table width='100%'>
                                            <tr>
                                                <td width='25%' rowspan='2'>
                                                    <a href='carpage.php?carName={$orders[$i]["carName"]}'><img src='images/{$orders[$i]["img"]}' style='width: 100%' class='carIcon'></a>
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
                                    <button id='makeOrder' name='action' value='purchase'>Оформити замовлення</button><br>
                                </div>";
                            }
                            else
                            {
                                echo "</div><h3>Наразі вантажівка пуста</h3>";
                            }
                            echo "</form>";
                        ?>
                   

                </td>
            </tr> 
            <tr>
                <td colspan="7">
                    <hr>
                </td>
            </tr>
            <tr id="footerTR">
                
            </tr>
            <tr>
                <td colspan="7">
                    <hr>
                </td>
            </tr>       
        </table>
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/truck.js"></script>
    </body>
    
</html>