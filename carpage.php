<!DOCTYPE html>
<html lang="en">
   
    <head>
        <meta charset="UTF-8">
        <title>Muscle car</title>
        <link href="styles/main.css" rel="stylesheet">
        <link href="styles/carpage.css" rel="stylesheet">
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
                <td colspan="7">
                    <?php
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
                        
                        //forming request about main info
                        $request = "SELECT * FROM car 
                                    INNER JOIN gallery ON car.ID = gallery.CarID
                                    WHERE Name = '{$_GET["carName"]}'";
                        $result = $conn->query($request);
                        $row = $result->fetch_array(); 
                    
                        //forming request about options
                        /*$requestOpt = "SELECT Engine, HP, options.Disk AS disk, Price FROM options 
                                    INNER JOIN car ON car.ID = options.CarID
                                    WHERE car.Name = '{$_GET["carName"]}'";
                        $resultOpt = $conn->query($requestOpt);
                    
                        $enginesInfo = ""; $disksInfo = ""; $pricesInfo = "";
                        while($rowOpt = $resultOpt->fetch_array())
                        {
                            $enginesInfo .= "{$rowOpt["Engine"]} {$rowOpt["HP"]}HP ";
                            $disksInfo .= "{$rowOpt["disk"]} ` ";
                            $pricesInfo .= "{$rowOpt["Price"]} ";
                        }*/
                        //echo $request;
                        echo "
                        <h1 id='labelText'></h1>
                        <table width='100%' border='0px'>
                            <tr>
                                <td width='50%' rowspan='2'>
                                    <img src='images/{$row["img"]}' class='mainImg'>
                                </td>
                                <td width='50%' rowspan='2'>
                                    <div class='descriptionDiv'>
                                        {$row["Description"]}
                                    </div>
                                    <button id='buyButton' class='buyButton'>Додати до вантажівки</button>
                                </td>
                            </tr>
                            <tr>
                                
                            </tr>
                            <tr>
                                <td colspan='2' align='center'>



                                    <table>
                                        <tr>
                                            <td>
                                                <button id='leftBSlider' align='left'>&#60;</button>
                                            </td>
                                            <td>
                                                <div id='slider'>
                                                    <div id='line'>
                                                        <img src='images/{$row["img1"]}' alt=''>
                                                        <img src='images/{$row["img2"]}' alt=''>
                                                        <img src='images/{$row["img3"]}' alt=''>
                                                        <img src='images/{$row["img4"]}' alt=''>
                                                        <img src='images/{$row["img5"]}' alt=''>
                                                        <img src='images/{$row["img6"]}' alt=''>
                                                        <img src='images/{$row["img7"]}' alt=''>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button id='rightBSlider'>&#62;</button>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        ";
                    ?>
                </td>
            </tr> 
            <tr>
                <td colspan="7" align="center">
                    <h1>Відгуки про даний автомобіль</h1><br>
                    
                    <?php
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
                        
                        //forming request
                        $request = "SELECT positive, commentText, `date`, `user`.avatar, `user`.login FROM `comment` JOIN `user` ON UserID = `user`.`ID` JOIN `car` ON CarID = `car`.`ID` WHERE car.Name = '{$_GET["carName"]}'";
                        $result = $conn->query($request);
                    
                        $commentsDisplayed = 0;
                        while($row = $result->fetch_array()) //fetching request to array
                        {
                            $commentImage = $row['positive'] == 1 ? "like.png" : "dislike.png"; //is it positive or negative comment?
                                
                            echo "
                                <div class='commentDiv'>
                                    <table>
                                        <tr>
                                            <td width='10%' rowspan='2'>
                                                <h4 style='text-align: center; margin-top: 10px;'>".$row["login"]."</h4>
                                                <img src='images/".$row['avatar']."'>
                                            </td>
                                            <td width='85%'>
                                                <b>Коментар було залишено ".$row['date']."</b>
                                            </td>
                                            <td width='5%' rowspan='2' align='center'>
                                                
                                                <img src='images/".$commentImage."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ".$row['commentText']."
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            ";
                            $commentsDisplayed++;
                        }
                        
                        if($commentsDisplayed == 0) echo "Наразі комментарів немає";
                        $conn->close(); //closing connection
                    ?>
                    
                    
                    <div id="leaveCommentDiv">
                        <form method="post" action = "phpScripts/addCommentScript.php">
                            <h2 style="margin: 20px;"><i>Залишіть свій відгук</i></h2>
                            <textarea id="" cols="30" rows="10" name="commentText"></textarea><br>
                            <input type="radio" name="positiveComment" id="goodOption" checked value="1"><label for="goodOption">Добре</label>
                            <input type="radio" name="positiveComment" id="badOption" value="0"><label for="badOption">Погано</label><br>
                            <button>Залишити відгук</button>
                            <input type="text" name="carname" class="formCarName" style="display: none" value="1">
                        </form>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <hr>
                </td>
            </tr>
            <tr id="footerTR">
                
            <tr>
                <td colspan="7">
                    <hr>
                </td>
            </tr>       
        </table>
        <div id="optionsDiv" class="hidden">
            <form method="post" action="phpScripts/addToTruckScript.php">
                <h1>Опції</h1><br>
                <br><h3>Колір</h3><br>
                <label class="container RC" style="color: red">Червоний
                  <input type="radio" checked name="carcolor" value="red">
                  <span class="checkmark"></span>
                </label>
                <label class="container GC" style="color: green">Зелений
                  <input type="radio" name="carcolor" value="green">
                  <span class="checkmark"></span>
                </label>
                <label class="container BC" style="color: blue">Синій
                  <input type="radio" name="carcolor" value="blue">
                  <span class="checkmark"></span>
                </label>
                <label class="container BlC" style="color: black">Чорний
                  <input type="radio" name="carcolor" value="black">
                  <span class="checkmark"></span>
                </label>
                <br><br><h3>Двигуни</h3><br>
                <div class="radio-toolbar">
                    <input type="radio" id="v8b" name="carengine" value="V8B" checked>
                    <label for="v8b">V8 big</label>

                    <input type="radio" id="v8" name="carengine" value="V8">
                    <label for="v8">V8</label>

                    <input type="radio" id="v6" name="carengine" value="V6">
                    <label for="v6">V6</label> 
                </div>
                <br><br><h3>Диски</h3><br>
                <div class="radio-toolbar">
                    <input type="radio" id="15d" name="cardisk" value="15" checked>
                    <label for="15d">15`</label>

                    <input type="radio" id="16d" name="cardisk" value="16">
                    <label for="16d">16`</label>

                    <input type="radio" id="17d" name="cardisk" value="17">
                    <label for="17d">17`</label> 
                </div><br>
                <h1>Загалом: <i>45000</i></h1>
                <button onclick="location.replace('truck.html')" class="buyButton">Вибрати</button>
                <input type="text" name="carname" class="formCarName" style="display: none" value="1">
            </form>
            
        </div>
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/carpage.js"></script>
    </body>
    
</html>