<?php
    if(!isset($_COOKIE["login"])) //if we`re not logged redirecting to login page
    {
        header('location: login.html');
    }

    include 'dbdata.php';
    include 'phpScripts/DBmanager.php';
    include 'phpScripts/User.php';
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
                                $user = new User($conn, $_COOKIE['login']);
                                echo "  <tr>
                                            <td width='33%'>Логін </td>
                                            <td width='33%'>{$user->getUserColumn('login')}</td>
                                            <td width='33%' align='center'><input type='button' class='changeButtonStyle changeButton' value='Змінити'></td>
                                            <td width='33%' class='hidden'><input type='text' value='{$user->getUserColumn('login')}' name='login'></td>
                                            <td width='33%' align='center' class='hidden'><input type='submit' class='changeButtonStyle changeButton' value='Змінити'></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Повне ім'я</td>
                                            <td width='33%'>{$user->getUserColumn('name')}</td>
                                            <td width='33%' align='center'><input type='button' class='changeButtonStyle changeButton' value='Змінити'</td>
                                            <td width='33%' class='hidden'><input type='text' value='{$user->getUserColumn('name')}' name='name'></td>
                                            <td width='33%' align='center' class='hidden'><input type='submit' class='changeButtonStyle changeButton' value='Змінити'></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Email</td>
                                            <td width='33%'>{$user->getUserColumn('email')}</td>
                                            <td width='33%' align='center'><input type='button' class='changeButtonStyle changeButton' value='Змінити'></td>
                                            <td width='33%' class='hidden'><input type='text' value='{$user->getUserColumn('email')}' name='email'></td>
                                            <td width='33%' align='center' class='hidden'><input type='submit' class='changeButtonStyle changeButton' value='Змінити'></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Адреса</td>
                                            <td width='33%'>{$user->getUserColumn('address')}</td>
                                            <td width='33%' align='center'><input type='button' class='changeButtonStyle changeButton' value='Змінити'></td>
                                            <td width='33%' class='hidden'><input type='text' value='{$user->getUserColumn('address')}' name='address'></td>
                                            <td width='33%' align='center' class='hidden'><input type='submit' class='changeButtonStyle changeButton' value='Змінити'></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Пароль</td>
                                            <td width='33%' class='hidden' id='passText'>{$user->getUserColumn('pass')}</td>
                                            <td width='33%' id='hiddenPassText'>*********</td>
                                            <td width='33%' align='center'><input type='button' class='changeButtonStyle changeButton' value='Змінити'></td>
                                            <td width='33%' class='hidden'><input type='text' value='{$user->getUserColumn('pass')}' name='pass'></td>
                                            <td width='33%' align='center' class='hidden'><input type='submit' class='changeButtonStyle changeButton' value='Змінити'></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Аватарка</td>
                                            <td width='33%'><img src='images/{$user->getUserColumn('avatar')}'></td>
                                            <td width='33%' align='center'><input type='button' class='changeButtonStyle changeButton' value='Змінити'></td>
                                            <td width='33%' class='hidden'><input type='file' name='avatar' size=''></td>
                                            <td width='33%' align='center' class='hidden'><input type='submit' class='changeButtonStyle changeButton' value='Змінити'></td>
                                        </tr>
                                        <tr><td colspan='3'><hr></td></tr>
                                        <tr>
                                            <td width='33%'>Замовлень</td>
                                            <td width='33%'>{$user->getUserColumn('orders')}</td>
                                            <td width='33%' align='center'><input type='button' href='catalog.php' class='changeButtonStyle' value='Змінити'></td>
                                        </tr>
                                        ";
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
 
</html>
