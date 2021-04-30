<?php
    if(!isset($_COOKIE["login"])) //if we`re not logged redirecting to login page
    {
        header('location: login.html');
    }

    include 'dbdata.php';
    include 'phpScripts/DBmanager.php';
    include 'phpScripts/Truck.php';
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
                    <div id='truckDiv'>
                        <form method='post' action='phpScripts/truckScript.php' id='truckForm'>
                           Please, wait...
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