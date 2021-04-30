<?php
    include 'dbdata.php';
    include 'phpScripts/DBmanager.php';
    include 'phpScripts/Car.php';
    include 'phpScripts/Comments.php';

?>

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
                    
                        $car = new Car($conn, $_GET["carName"]);
                        $gallery = $car->getGallery();
                    
                        echo "
                        <h1 id='labelText'></h1>
                        <table width='100%' border='0px'>
                            <tr>
                                <td width='50%' rowspan='2'>
                                    <img src='images/{$car->getCarColumn('img')}' class='mainImg'>
                                </td>
                                <td width='50%' rowspan='1'>
                                    <div class='descriptionDiv'>
                                        {$car->getCarColumn("Description")}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width='50%'>
                                    <div class='descriptionDiv'>
                                        <h2>Виробник: {$car->getManufacturer()}</h2><br><br>
                                        <h2>Рік виходу: {$car->getCarColumn('year')}</h2><br><br>
                                        <h2 id='scoreText'>"; 
                    
                        //what score car get
                        $score = $car->getAVGScore();
                        if($score > 0) echo "{$score}% позитивних відгуків";
                        else echo "Наразі відгуків немає";
                    
                        echo "</h2><br>
                                        <button id='buyButton' class='buyButton'>Обрати опції</button>
                                    </div>
                                </td>
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
                                                        <img src='images/{$gallery["img1"]}' alt=''>
                                                        <img src='images/{$gallery["img2"]}' alt=''>
                                                        <img src='images/{$gallery["img3"]}' alt=''>
                                                        <img src='images/{$gallery["img4"]}' alt=''>
                                                        <img src='images/{$gallery["img5"]}' alt=''>
                                                        <img src='images/{$gallery["img6"]}' alt=''>
                                                        <img src='images/{$gallery["img7"]}' alt=''>
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
                    <div id='commentsDiv'>
                        Please wait...
                    </div>
                    
                    <div id="leaveCommentDiv">
                        <form method="post" action = "phpScripts/addCommentScript.php" id='leaveCommentForm'>
                            <h2 style="margin: 20px;"><i>Залишіть свій відгук</i></h2>
                            <textarea id="comment" cols="30" rows="10" name="commentText"></textarea><br>
                            <input type="radio" name="positiveComment" id="goodOption" checked value="1"><label for="goodOption">Добре</label>
                            <input type="radio" name="positiveComment" id="badOption" value="0"><label for="badOption">Погано</label><br>
                            <button>Залишити відгук</button>
                            <input type="text" id="carname" name="carname" class="formCarName" style="display: none" value="1">
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
            <form method="post" action="phpScripts/addToTruckScript.php" id="optionsForm">
                <h1>Опції</h1><br>
                <br><h3>Колір</h3><br>
                <label class="container RC optionRadio" style="color: red">Червоний
                  <input type="radio" name="carcolor" value="red" checked>
                  <span class="checkmark"></span>
                </label>
                <label class="container GC optionRadio" style="color: green">Зелений
                  <input type="radio" name="carcolor" value="green">
                  <span class="checkmark"></span>
                </label>
                <label class="container BC optionRadio" style="color: blue">Синій
                  <input type="radio" name="carcolor" value="blue">
                  <span class="checkmark"></span>
                </label>
                <label class="container BlC optionRadio" style="color: black">Чорний
                  <input type="radio" name="carcolor" value="black">
                  <span class="checkmark"></span>
                </label>
                <br><br><h3>Двигуни</h3><br>
                <div class="radio-toolbar">
                    <input type="radio" id="v8b" name="carengine" value="V8B" class="optionRadio" checked>
                    <label for="v8b">V8 big</label>

                    <input type="radio" id="v8" name="carengine" value="V8" class="optionRadio">
                    <label for="v8">V8</label>

                    <input type="radio" id="v6" name="carengine" value="V6" class="optionRadio">
                    <label for="v6">V6</label> 
                </div>
                <br><br><h3>Диски</h3><br>
                <div class="radio-toolbar">
                    <input type="radio" id="15d" name="cardisk" value="15" class="optionRadio" checked>
                    <label for="15d">15`</label>

                    <input type="radio" id="16d" name="cardisk" value="16" class="optionRadio">
                    <label for="16d">16`</label>

                    <input type="radio" id="17d" name="cardisk" value="17" class="optionRadio">
                    <label for="17d">17`</label> 
                </div><br>
                <h1 id='optionPrice'>Виберіть будь ласка комплектацію</h1>
                <button class="buyButton" id="addToTruckButton">Вибрати</button>
                <input type="text" name="carname" class="formCarName" style="display: none" value="1">
                <i style="display: none" id="empty"></i>
            </form>
            
        </div>
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/carpage.js"></script>
    </body>
    
</html>