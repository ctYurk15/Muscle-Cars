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
                    <h1 id="labelText"></h1>
                    <table width="100%" border="0px">
                        <tr>
                            <td width="50%" rowspan="2">
                                <img src="images/camaross1969.jpg" class="mainImg">
                            </td>
                            <td width="50%">
                                <div class="descriptionDiv">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" align="left">
                                <div class="statsDiv">
                                    <h3><b>Характеристики:</b></h3>
                                    <h3>Мотор - <i>V8 396HP</i></h3>
                                    <h3>Диски - <i>15'</i></h3>
                                    <h3>0-60 - <i>6.5s</i></h3>
                                    <h3>Ціна - <i id="priceText">30000</i></h3>
                                </div>
                                <button id="buyButton" class="buyButton">Додати до вантажівки</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                
                                
                                
                                <table>
                                    <tr>
                                        <td>
                                            <button id="leftBSlider" align="left">&#60;</button>
                                        </td>
                                        <td>
                                            <div id="slider">
                                                <div id="line">
                                                    <img src="images/camaross1969.jpg" alt="">
                                                    <img src="images/camaross1969.jpg" alt="">
                                                    <img src="images/camaross1969.jpg" alt="">
                                                    <img src="images/camaross1969.jpg" alt="">
                                                    <img src="images/camaross1969.jpg" alt="">
                                                    <img src="images/camaross1969.jpg" alt="">
                                                    <img src="images/camaross1969.jpg" alt="">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button id="rightBSlider">&#62;</button>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
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
                        $request = "SELECT positive, commentText, `date`, `user`.avatar FROM `comment` JOIN `user` ON UserID = `user`.`ID` JOIN `car` ON CarID = `car`.`ID` WHERE `user`.`login` = 'ctyurk15'";
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
                            <textarea id="" cols="30" rows="10" name="commentText"></textarea>
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
                <h1>Опції</h1>
                <h2 style="margin: 10px;">Колір:</h2>
                <input type="button" name="carColor" id="redCC" class="radioColor">
                <input type="button" name="carColor" id="greenCC" class="radioColor">
                <input type="button" name="carColor" id="blueCC" class="radioColor">
                <input type="button" name="carColor" id="blackCC" class="radioColor"><br>
                <h2 style="margin: 10px;">Двигун:</h2>
                <input type="button" value="426 HEMI" class="engineButton">
                <input type="button" value="426 HEMI" class="engineButton">
                <input type="button" value="426 HEMI" class="engineButton"><br>
                <h2 style="margin: 10px;">Диски:</h2>
                <input type="button" value="13" class="engineButton">
                <input type="button" value="14" class="engineButton">
                <input type="button" value="15" class="engineButton"><br>
                <button onclick="location.replace('truck.html')" class="buyButton">Вибрати</button>
                <input type="text" name="carname" class="formCarName" style="display: none" value="1">
            </form>
            
        </div>
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/carpage.js"></script>
    </body>
    
</html>