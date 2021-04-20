<?php
    if(!isset($_COOKIE["login"])) //if we`re not logged redirecting to login page
    {
        header('location: login.html');
    }
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
                    
                            echo "<div id='truckDiv'>";
                        
                            //variables using for connection to db
                            $servername = "localhost";
                            $database = "muscle-carsdb";
                            $username = "root";
                            $password = "root";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $database);
                            if ($mysqli->connect_errno) 
                            {
                                printf("Failed to connect to: %s\n", $mysqli->connect_error);
                                exit();
                            }
                            
                            $request = "SELECT car.name AS carName, car.year, manufacturer.name AS manufacturerName, car.img, `options`.HP,                         `options`.disk, `options`.Color, `options`.price, `order`.Count, `order`.ID AS orderID
                                        FROM `order` 
                                        JOIN `options` ON `options`.ID = OptionID 
                                        JOIN car ON car.ID = `options`.CarID
                                        JOIN `user` ON `user`.ID = UserID 
                                        JOIN manufacturer ON manufacturer.ID = car.ManufacturerID 
                                        WHERE `user`.login = '{$_COOKIE['login']}'";
                             //echo $request;
                            $result = $conn->query($request);
                    
                            echo "<form method='post' action='phpScripts/truckScript.php'>";
                            $goodsCount = 0;
                            while($row = $result->fetch_array()) //fetching request to array
                            {
                                echo " 
                                    <div class='truckItem'>
                                        <table width='100%'>
                                            <tr>
                                                <td width='25%' rowspan='2'>
                                                    <a href='carpage.php?carName={$row["carName"]}'><img src='images/{$row["img"]}' style='width: 100%' class='carIcon'></a>
                                                </td>
                                                <td width='50%' colspan='3'>
                                                    <h3>{$row["manufacturerName"]} {$row["carName"]} {$row["year"]}</h3>
                                                </td>
                                                <td width='25%' align='center'>
                                                    $<i id='priceText{$goodsCount}' name='priceText'>{$row["price"]}</i>
                                                </td>
                                            </tr>
                                            <tr align='center'>
                                                <td >{$row["HP"]}</td>
                                                <td>{$row["disk"]}`</td>
                                                <td>{$row["Color"]}</td>
                                                <td>
                                                    
                                                        <button class='countButton' onclick='updateSumPrice()' value='{$row["orderID"]},+' name='action'>+</button>
                                                        <i id='count{$goodsCount}'>{$row["Count"]}</i>
                                                        <button class='countButton' onclick='updateSumPrice()' value='{$row["orderID"]},-' name='action'>-</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                ";
                                $goodsCount++;
                            }
                            if($goodsCount != 0) 
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
                            $conn->close(); //closing connection
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