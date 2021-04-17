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
?>
<!DOCTYPE html>
<html lang="en">
   
    <head>
        <meta charset="UTF-8">
        <title>Muscle cars shop - каталог</title>
        <link href="styles/main.css" rel="stylesheet">
        <link href="styles/catalog.css" rel="stylesheet">
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
                    <div class="car-container" style="border: 0px solid black">
                        <br><h1>Фільтри</h1>
                        <div id="filtersDiv">
                            <form>
                                <h3>Ціна:</h3>
                                <label for="minPrice">Від: </label><input type="text" value="0" id="minPrice" size="7">
                                <label for="maxPrice">До: </label><input type="text" value="0" id="maxPrice" size="7">
                                <br><br>
                                <h3>Диски(у дюймах):</h3>
                                <label for="minWS">Від: </label><input type="text" value="0" id="minWS" size="7">
                                <label for="maxWS">До: </label><input type="text" value="0" id="maxWS" size="7">
                                <br><br>
                                <h3>Потужність двигуна(у кінських силах):</h3>
                                <label for="minHP">Від: </label><input type="text" value="0" id="minHP" size="7">
                                <label for="maxHP">До: </label><input type="text" value="0" id="maxHP" size="7">
                                <br><br>
                                <h3>Виробник: </h3>
                                <?php
                                    $result = $conn->query("SELECT Name FROM manufacturer"); //making request
                                    while($row = $result->fetch_array())
                                    {
                                        $manufacturerName = $row['Name']; //getting manufacturer name
                                        echo "<input type='checkbox' id='$manufacturerName'><lable for='$manufacturerName'>$manufacturerName</lable><br>";
                                    }
                                ?>
                                <br><br>
                                <h3>Сортувати за: </h3>
                                <select name="sorting" id="sortingSelect">
                                    <option name="sortingOptions" value='price ASC' disabled>Зростанням ціни</option>
                                    <option name="sortingOptions" value='price DESC' disabled>Спаданням ціни</option>
                                    <option name="sortingOptions" value="year DESC">Від новіших до старіших</option>
                                    <option name="sortingOptions" value="year ASC">Від старіших до новіших</option>
                                    <option name="sortingOptions" value="name">Алфавітним порядком</option>
                                    <option name="sortingOptions" value="engine ASC" disabled>Від потужнішого до слабшого двигуна</option>
                                    <option name="sortingOptions" value="engine DESC" disabled>Від слабшого до потужнішого двигуна</option>
                                </select>
                                <br><br>
                                <button>Застосувати</button>
                            </form>
                        </div>
                    </div>
                    <?php
                        
                    
                        //getting sorting type
                        $sorting = " ";
                        if(isset($_GET['sorting']))
                        {
                            if($sorting == 'price ASC' || $sorting == 'price DESC') //sorting by price
                            {
                                
                            }
                            elseif($sorting == 'engine ASC' || $sorting == 'price DESC') //sorting by price
                            {
                                
                            }
                            else //simple sorting. does not requires additional request
                            {
                                $sorting = "ORDER BY ".$_GET['sorting'];
                            }
                            
                            //returning form state to previous
                            echo "
                                <script>
                                    //getting sorting type
                                    var url = new URL(window.location.href);
                                    var sortingType = url.searchParams.get('sorting');
                                    
                                    var selectTag = document.getElementById('sortingSelect');
                                    //checking all options
                                    for(var i = 0; i < selectTag.options.length; i++)
                                    {
                                        console.log(selectTag.options[i].value == sortingType);
                                        if(selectTag.options[i].value == sortingType)
                                        {
                                            selectTag.options[i].selected = true;
                                            break;
                                        }
                                        else
                                        {
                                            selectTag.options[i].selected = false;
                                        }
                                    }
                                </script>
                            ";
                        }
                    
                        $result = $conn->query("SELECT * FROM car {$sorting}");
                        while($row = $result->fetch_array()) //fetching request to array
                        {
                            echo "
                                <div class='car-container car-block'>
                                    <br><h1>".$row['name']."</h1>
                                    <img src='images/".$row['img']."'><br>
                                    <button>Детальніше</button>
                                </div>
                            ";
                        }

                        $conn->close(); //closing connection
                    ?>
                    
                </td>
            </tr> 
            <tr>
                <td colspan="7">
                    <button align="center" id="moreButton">Ще</button>
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
        <div id="transparentDiv" class="transparent-div hidden"></div>
        <div class="catalog-car-info hidden" id="carInfoBlock"> 
            <br><h1>None</h1><br>
            <img src="images/camaross1969.jpg"><br>
            <div style="text-align: left; padding: 20px;">
                <h3>Мотор - <i>V8 396HP</i></h3>
                <h3>Диски - <i>21'</i></h3>
                <h3>0-60 - <i>6.5s</i></h3>
                <h3>Ціна - <i id="priceText">30000</i></h3>
                <br><h3>Опис:</h3>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. 
            </div>
            <button id="buyCarButton" data-carName="empty">Купити</button>
        </div>
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/catalog.js"></script>
    </body>
    
</html>