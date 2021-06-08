<?php
    include 'dbdata.php';
    include 'phpScripts/DBmanager.php';
    include 'phpScripts/Car.php';
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
                                <h3>Ціна(в $):</h3>
                                <label for="minPrice">Від: </label><input type="text" value="" id="minPrice" name="minPrice" size="7">
                                <label for="maxPrice">До: </label><input type="text" value="" id="maxPrice" name="maxPrice" size="7">
                                <br><br>
                                <h3>Диски(у дюймах):</h3>
                                <label for="minWS">Від: </label><input type="text" value="" id="minWS" name="minWS" size="7">
                                <label for="maxWS">До: </label><input type="text" value="" id="maxWS" name="maxWS" size="7">
                                <br><br>
                                <h3>Потужність двигуна(у кінських силах):</h3>
                                <label for="minHP">Від: </label><input type="text" value="" id="minHP" name="minHP" size="7">
                                <label for="maxHP">До: </label><input type="text" value="" id="maxHP" name="maxHP" size="7">
                                <br><br>
                                <h3>Виробник: </h3>
                                <div id="manufacturerDiv">
                                    Loading...
                                </div>
                                <br>
                                <h3>Сортувати за: </h3>
                                <select name="sorting" id="sortingSelect">
                                    <option name="sortingOptions" value='options.price ASC' >Зростанням ціни</option>
                                    <option name="sortingOptions" value='options.price DESC'>Спаданням ціни</option>
                                    <option name="sortingOptions" value="car.year DESC">Від новіших до старіших</option>
                                    <option name="sortingOptions" value="car.year ASC">Від старіших до новіших</option>
                                    <option name="sortingOptions" value="car.name">Алфавітним порядком</option>
                                    <option name="sortingOptions" value="options.HP DESC">Від потужнішого до слабшого двигуна</option>
                                    <option name="sortingOptions" value="options.HP ASC">Від слабшого до потужнішого двигуна</option>
                                </select>
                                <br><br>
                                <button>Застосувати</button>
                            </form>
                        </div>
                    </div>
                        <?php
                                
                                echo "<script>
                                        var url = new URL(window.location.href);";
                        
                                //getting sorting type
                                $sorting = " ";
                                if(isset($_GET['sorting']))
                                {
                                    $sorting = "ORDER BY ".$_GET['sorting'];
                                    //returning form state to previous
                                    echo "
                                        //getting sorting type
                                        var sortingType = url.searchParams.get('sorting');
                                        var selectTag = document.getElementById('sortingSelect');
                                        //checking all sorting options
                                        for(var i = 0; i < selectTag.options.length; i++)
                                        {
                                            //console.log(selectTag.options[i].value == sortingType);
                                            if(selectTag.options[i].value == sortingType)
                                            {
                                                selectTag.options[i].selected = true;
                                                break;
                                            }
                                            else
                                            {
                                                selectTag.options[i].selected = false;
                                            }
                                        }";


                                }
                                
                                //getting all filters used
                                $filters = " WHERE car.ID > 0 ";
                    
                                //prices
                                if(isset($_GET['minPrice']) && $_GET['minPrice'] != "")  //min
                                {
                                    $minPrice = $_GET['minPrice'];
                                    $filters .= " AND options.price > {$minPrice} "; //adding to request query
                                    echo " document.getElementById('minPrice').value = {$minPrice}; "; //returning form state
                                }
                                if(isset($_GET['maxPrice']) && $_GET['maxPrice'] != "")  //max
                                {
                                    $maxPrice = $_GET['maxPrice'];
                                    $filters .= " AND options.price < {$maxPrice} "; //adding to request query
                                    echo " document.getElementById('maxPrice').value = {$maxPrice}; "; //returning form state
                                }
                    
                                //disks
                                if(isset($_GET['minWS']) && $_GET['minWS'] != "")  //min
                                {
                                    $minWS = $_GET['minWS'];
                                    $filters .= " AND options.Disk > {$minWS} "; //adding to request query
                                    echo " document.getElementById('minWS').value = {$minWS}; "; //returning form state
                                }
                                if(isset($_GET['maxWS']) && $_GET['maxWS'] != "")  //max
                                {
                                    $maxWS = $_GET['maxWS'];
                                    $filters .= " AND options.Disk < {$maxWS} "; //adding to request query
                                    echo " document.getElementById('maxWS').value = {$maxWS}; "; //returning form state
                                }
                    
                                //Horsepowers
                                if(isset($_GET['minHP']) && $_GET['minHP'] != "")  //min
                                {
                                    $minHP = $_GET['minHP'];
                                    $filters .= " AND options.HP > {$minHP} "; //adding to request query
                                    echo " document.getElementById('minHP').value = {$minHP}; "; //returning form state
                                }
                                if(isset($_GET['maxHP']) && $_GET['maxHP'] != "")  //max
                                {
                                    $maxHP = $_GET['maxHP'];
                                    $filters .= " AND options.HP < {$maxHP} "; //adding to request query
                                    echo " document.getElementById('maxHP').value = {$maxHP}; "; //returning form state
                                }
                                
                                if(isset($_GET['manufacturer'])) //for manufacturers
                                {
                                    $manufacturers = $_GET['manufacturer'];
                                    if(count($manufacturers) > 1) //if we have multiple manufacturers
                                    {
                                        $filters .= "AND (manufacturer.Name = '{$manufacturers[0]}'";
                                        for($i = 1; $i < count($manufacturers); $i++)
                                        {
                                            $filters .= " OR manufacturer.Name = '{$manufacturers[$i]}'";
                                        }
                                        $filters .= ") ";
                                    }
                                    else $filters .= "AND manufacturer.Name = '{$manufacturers[0]}'";
                                    
                                    
                                    //returning form state to previous
                                    echo "//checking all manufacturer options
                                            var manufacturerCheckBoxes = document.getElementsByName('manufacturer[]'); //getting checkboxes
                                            var selectedManufacturers = url.searchParams.getAll('manufacturer[]');
                                            for(var i = 0; i < manufacturerCheckBoxes.length; i++)
                                            {
                                                //checking for all manufacturers
                                                for(var j = 0; j < selectedManufacturers.length; j++)
                                                {
                                                    if(manufacturerCheckBoxes[i].value == selectedManufacturers[j]) //if we checked this manufacturer
                                                    {
                                                        manufacturerCheckBoxes[i].checked = true;
                                                    }
                                                }
                                            }";
                                }
                            echo "</script>";
                            
                            $cars = Car::getAllCars($filters, $sorting, $conn);
                            for($i = 0 ; $i < count($cars); $i++)
                            {
                                echo "
                                    <div class='car-container car-block hidden'>
                                        <br><h1>{$cars[$i]['carName']}</h1>
                                        <img src='images/{$cars[$i]['carImg']}' value='1'><br>
                                        <button>Детальніше</button>
                                        <i style='display: none' class='description'>{$cars[$i]['carDesription']}</i>
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
                <div id='descriptionDiv'>
                    
                </div>
            </div>
            <button id="buyCarButton" data-carName="empty">Купити</button>
        </div>
        <script src="scripts/jquery.min.js" type="text/javascript"></script>
        <script src="scripts/main.js" type="text/javascript"></script>
        <script src="scripts/catalog.js" type="text/javascript"></script>
    </body>
    
</html>