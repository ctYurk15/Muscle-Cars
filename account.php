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
                            <tr>
                                <td width="33%">Логін </td>
                                <td width="33%"><?php echo $_COOKIE["login"]; ?></td>
                                <td width="33%" align="center"><button id="changeLogin">Змінити</button></td>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            <tr>
                                <td width="33%">Повне ім'я</td>
                                <td width="33%">Зубенко Михаїл Петрович</td>
                                <td width="33%" align="center"><button id="changeName">Змінити</button></td>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            <tr>
                                <td width="33%">Email</td>
                                <td width="33%">mafeoznik@aue.com</td>
                                <td width="33%" align="center"><button id="changeName">Змінити</button></td>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            <tr>
                                <td width="33%">Аватарка</td>
                                <td width="33%"><img src="images/account.png"></td>
                                <td width="33%" align="center"><button id="changeName">Змінити</button></td>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            <tr>
                                <td width="33%">Замовлень</td>
                                <td width="33%">32</td>
                                <td width="33%" align="center"><button id="changeName" onclick="location.replace('catalog.php')">Змінити</button></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center">
                                    <hr>
                                    <button onclick="location.replace('phpScripts/unloginScript.php')">Вийти з аккаунту</button>
                                </td>
                            </tr>
                        </table><br>
                    </div>
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
    </body>
    
</html>