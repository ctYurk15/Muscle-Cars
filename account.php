<?php
    if(!isset($_COOKIE["login"])) //if we`re not logged redirecting to login page
    {
        header('location: login.html');
    }

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
        <title>Muscle cars shop - аккаунт</title>
        <link href="styles/main.css" rel="stylesheet">
        <link href="styles/account.css" rel="stylesheet">
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
                <td colspan="2">
                    <img src="images/profileImg1.png" class="profileImg">
                </td>
                <td colspan="3" valign="top">
                    <br><h1>Мій аккаунт</h1><br>
                    <div id="profileDiv">
                        <table class="myTable"> 
                           <form method="post" action="phpScripts/accountScript.php">
                            <?php
                                //getting all info about user with login we currently have in cookies
                                $request = "SELECT * FROM `user` WHERE login = '{$_COOKIE['login']}'";
                                $result = $conn->query($request)->fetch_array(); //converting to associative array
                                echo "  <tr>
                                            <td width='33%'>Логін </td>
                                            <td width='33%'>{$result['login']}</td>
                                            <td width='33%' align='center'><input type='button' class='changeButton' value='Змінити' id='login'></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Повне ім'я</td>
                                            <td width='33%'>{$result['name']}</td>
                                            <td width='33%' align='center'><input type='button' class='changeButton' value='Змінити' id='name'></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Email</td>
                                            <td width='33%'>{$result['email']}</td>
                                            <td width='33%' align='center'><button id='changeName'>Змінити</button></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Адреса</td>
                                            <td width='33%'>{$result['address']}</td>
                                            <td width='33%' align='center'><button>Змінити</button></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Пароль</td>
                                            <td width='33%' class='hidden' id='passText'>{$result['pass']}</td>
                                            <td width='33%' id='hiddenPassText'>*********</td>
                                            <td width='33%' align='center'><button>Змінити</button></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Аватарка</td>
                                            <td width='33%'><img src='images/{$result['avatar']}'></td>
                                            <td width='33%' align='center'><button>Змінити</button></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Замовлень</td>
                                            <td width='33%'>{$result['orders']}</td>
                                            <td width='33%' align='center'><button onclick='location.replace('catalog.php')'>Змінити</button></td>
                                        </tr>
                                        <tr>
                                            <td colspan='3' align='center'>
                                                <hr>
                                                <button onclick='unlogin()'>Вийти з аккаунту</button>
                                            </td>
                                        </tr>"
                            ?>
                            </form>
                        </table><br>
                    </div><br>
                </td>
                <td colspan="2">
                    <img src="images/profileImg2.png" class="profileImg">
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
        <script src="scripts/account.js"></script>
    </body>

    <script>
        function unlogin()
        {
            location.replace("phpScripts/unloginScript.php");
        }
    </script>    
</html>
