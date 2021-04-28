<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adminka</title>
    <style>
        #mainTable
        {
            height: 97vh;
            width: 100%;
            
        }
        
        .changeButton
        {
            width: 95%;
            font-size: 20px;
            text-align: center;
            margin: 10px;
        }
        
        .changeBlock
        {
            top: 0;
            position: fixed;
            width: 100%;
            height: 100%;
            font-size: 20px;
            background-color: lightgray;
        }
        
        .hidden
        {
            display: none;
            width: 0%;
            height: 0%;
        }
        
    </style>
</head>
<body>
    <table border='0px' id="mainTable">
        <tr>
            <td width="25%" valign="top">
                <h1>Welcome to adminka - powerfull admin panel tool!</h1>
                <button data-block="changeUsers" class="changeButton">Users</button><br>
                <button data-block="changeCars" class="changeButton">Cars</button><br>
                <button data-block="changeOptions" class="changeButton">Options</button><br>
                <button data-block="changeManufacturers" class="changeButton">Manufacturers</button><br>
                <hr>
                <button data-block="addNews" class="changeButton">Add news</button><br>
                <hr>
                <button data-block="generalInfo" class="changeButton">General info</button><br>
            </td>
            <td width="74%" valign="bottom">
                <div class="changeBlock" data-block="changeDefault">
                    <h1>Choose category</h1>
                </div>
                <div class="changeBlock hidden" data-block="changeUsers">
                    <h1>Users</h1>
                </div>
                <div class="changeBlock hidden" data-block="changeCars">
                    <h1>Cars</h1>
                </div>
                <div class="changeBlock hidden" data-block="changeOptions">
                    <h1>Options</h1>
                </div>
                <div class="changeBlock hidden" data-block="changeManufacturers">
                    <h1>Manufacturers</h1>
                </div>
                <div class="changeBlock hidden" data-block="addNews">
                    <h1>News</h1>
                </div>
                <div class="changeBlock hidden" data-block="generalInfo">
                    <h1>info</h1>
                </div>
            </td>
        </tr>
    </table>
</body>

<script src="scripts/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".changeButton").on("click", function(){
            //getting block we need
            var block = $(this).attr("data-block");
            
            $(".changeBlock").addClass('hidden');
            $(".changeBlock[data-block='"+block+"']").removeClass('hidden');
        });
    });
</script>

</html>