<?php
    if(!isset($_COOKIE["login"])) //if we`re not logged - redirecting to login page
    {
        header('location: login.html');
    }
    else
    {
        //if this user has admin permissions
        
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
        
        //if our user admin or not
        $request = "SELECT admin FROM `user` WHERE login = '{$_COOKIE['login']}'";
        $hasPermission = $conn->query($request)->fetch_array()['admin']; 
    }
    
?>
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
            text-align: center;
        }
        
        .changeBlock
        {
            top: 0;
            position: absolute;
            width: 100%;
            height: 100vh;
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
                <h1>Welcome to adminka - not powerfull admin panel tool!</h1>
                <button data-block="changeMain" class="changeButton">Main</button><br>
                <button data-block="changeUsers" class="changeButton">Users</button><br>
                <button data-block="changeCars" class="changeButton">Cars</button><br>
                <button data-block="changeOptions" class="changeButton">Options</button><br>
                <button data-block="changeManufacturers" class="changeButton">Manufacturers</button><br>
                <button data-block="changeGallery" class="changeButton">Gallery</button><br>
                <hr>
                <button data-block="addNews" class="changeButton">Add news</button><br>
                <hr>
                <button data-block="generalInfo" class="changeButton">General info</button><br>
            </td>
            <td width="74%" valign="bottom">
                <div class="changeBlock" data-block="changeMain">
                    <h1>Adminka 2021, all rights reserved(No)</h1><br>
                    <h3>Assume that in order to add car you need first have manufacturer, then add car, then gallery and finally some options.</h3>
                </div>
                <div class="changeBlock hidden" data-block="changeUsers">
                    <h1>Users</h1><hr>
                    <h3>All users</h3>
                    <table border='1px'>
                        <tr>
                            <td>ID</td>
                            <td>login</td>
                            <td>name</td>
                            <td>email</td>
                            <td>pass</td>
                            <td>address</td>
                            <td>avatar</td>
                            <td>orders</td>
                            <td>is admin</td>
                        </tr>
                    <?php
                        //getting all users
                        $request = "SELECT * FROM `user`";
                        $result = $conn->query($request);
                        
                        while($row = $result->fetch_array())
                        {
                            echo "  <tr>
                                        <td>{$row['ID']}</td>
                                        <td>{$row['login']}</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['pass']}</td>
                                        <td>{$row['address']}</td>
                                        <td>images/{$row['avatar']}</td>
                                        <td>{$row['orders']}</td>
                                        <td>{$row['admin']}</td>
                                    </tr>";
                        }
                    ?>
                    </table><hr>
                    <h3>Add user</h3>
                    <form method='post'>
                        <input type='text' name='login' placeholder='login'>
                        <input type='text' name='name' placeholder='name'>
                        <input type='text' name='email' placeholder='email'>
                        <input type='text' name='pass' placeholder='pass'>
                        <button name='submitUser'>Add user</button>
                    </form><hr>
                    <h3>Delete user</h3>
                    <form method='post'>
                        <input type='text' name='user_id' placeholder='id'>
                        <button name='deleteUser'>Delete user</button>
                    </form><hr>
                    <h3>Make user admin</h3>
                    <form method='post'>
                        <input type='text' name='user_id' placeholder='id'>
                        <button name='rootUser'>Make user admin</button>
                    </form>
                </div>
                <div class="changeBlock hidden" data-block="changeCars">
                    <h1>Cars</h1><hr>
                    <h3>All cars</h3>
                    <table border='1px'>
                        <tr>
                            <td >ID</td>
                            <td>name</td>
                            <td>year</td>
                            <td>img</td>
                            <td >Description</td>
                            <td>Short description</td>
                            <td>Manufacturer ID</td>
                            <td>Manufacturer name</td>
                        </tr>
                    <?php
                        //getting all users
                        $request = "SELECT car.ID AS carID, car.name AS carName, car.year AS carYear, car.img AS carImg, car.Description AS carDescription,
                                    car.ShortDescription AS Shortdescription, manufacturer.ID AS manufacturerID, manufacturer.Name AS manufacturerName
                                    FROM car 
                                    JOIN manufacturer ON manufacturer.ID = car.ManufacturerID
                                    ORDER BY car.ID";
                        $result = $conn->query($request);
                        
                        while($row = $result->fetch_array())
                        {
                            //cutting desription
                            $carDescription = substr($row['carDescription'], 0, 40);
                            $Shortdescription = substr($row['Shortdescription'], 0, 40);
                            
                            echo "  <tr>
                                        <td>{$row['carID']}</td>
                                        <td>{$row['carName']}</td>
                                        <td>{$row['carYear']}</td>
                                        <td>images/{$row['carImg']}</td>
                                        <td>{$carDescription}...</td>
                                        <td>{$Shortdescription}...</td>
                                        <td>{$row['manufacturerID']}</td>
                                        <td>{$row['manufacturerName']}</td>
                                    </tr>";
                        }
                    ?>
                    </table><hr>
                    <h3>Add car</h3>
                    <form method='post'>
                        <input type='text' name='carName' placeholder='name'>
                        <input type='text' name='carYear' placeholder='year'>
                        <input type='text' name='carImg' placeholder='picture url'><br>
                        <textarea name='description'></textarea><br>
                        <textarea name='shortDescription' placeholder='short description'></textarea><br>
                        <input type='text' name='manufacturerId' placeholder='manufacturer Id'>
                        <button name='submitCar'>Add car</button>
                    </form><hr>
                    <h3>Delete car</h3>
                    <form method='post'>
                        <input type='text' name='id' placeholder='id'>
                        <button name='deleteCar'>Delete car</button>
                    </form>
                </div>
                <div class="changeBlock hidden" data-block="changeOptions">
                    <h1>Options</h1>
                    <h3>All options</h3>
                    <table border='1px'>
                        <tr>
                            <td>ID</td>
                            <td>Color</td>
                            <td>Engine</td>
                            <td>HP</td>
                            <td>Disk</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>CarID</td>
                            <td>CarName</td>
                        </tr>
                    <?php
                        //getting all users
                        $request = "SELECT options.ID as optionsID, Color AS color, Engine AS engine, HP AS hp, Disk AS disk, Quantity AS quantity,
                                    Price AS price, car.ID AS carID, car.name AS carName
                                    FROM options
                                    JOIN car ON car.ID = options.CarID 
                                    ";
                        $result = $conn->query($request);
                        
                        while($row = $result->fetch_array())
                        {
                            echo "  <tr>
                                        <td>{$row['optionsID']}</td>
                                        <td>{$row['color']}</td>
                                        <td>{$row['engine']}</td>
                                        <td>{$row['hp']}</td>
                                        <td>{$row['disk']}</td>
                                        <td>{$row['quantity']}</td>
                                        <td>{$row['price']}</td>
                                        <td>{$row['carID']}</td>
                                        <td>{$row['carName']}</td>
                                    </tr>";
                        }
                    ?>
                    </table><hr>
                    <h3>Add option</h3>
                    <form method='post'>
                        <select name='Color'>
                            <option value='red'>Red</option>
                            <option value='green'>Green</option>
                            <option value='blue'>Blue</option>
                            <option value='black'>Black</option>
                        </select>
                        <select name='Engine'>
                            <option value='V8B'>V8B</option>
                            <option value='V8'>V8</option>
                            <option value='V6'>V6</option>
                        </select>
                        <input type='text' name='HP' placeholder='horsepowers'>
                        <input type='text' name='Disk' placeholder='disk diameter'>
                        <input type='text' name='Quantity' placeholder='Quantity'>
                        <input type='text' name='Price' placeholder='price(in $)'>
                        <input type='text' name='CarID' placeholder='car id'>
                        <button name='submitOption'>Add option</button>
                    </form><hr>
                    <h3>Delete option</h3>
                    <form method='post'>
                        <input type='text' name='id' placeholder='id'>
                        <button name='deleteOption'>Delete option</button>
                    </form><hr>
                    <h3>Change quantity of option</h3>
                    <form method='post'>
                        <input type='text' name='id' placeholder='id'>
                        <input type='text' name='quantity' placeholder='new quantity'>
                        <button name='changeOption'>Change option</button>
                    </form>
                </div>
                <div class="changeBlock hidden" data-block="changeManufacturers">
                    <h1>Manufacturers</h1>
                    <h3>All manufacturers</h3>
                    <table border='1px'>
                        <tr>
                            <td >ID</td>
                            <td>name</td>
                        </tr>
                    <?php
                        //getting all users
                        $request = "SELECT * FROM manufacturer";
                        $result = $conn->query($request);
                        
                        while($row = $result->fetch_array())
                        {
                            echo "  <tr>
                                        <td>{$row['ID']}</td>
                                        <td>{$row['Name']}</td>
                                    </tr>";
                        }
                    ?>
                    </table><hr>
                    <h3>Add manufacturer</h3>
                    <form method='post'>
                        <input type='text' name='name' placeholder='name'>
                        <button name='submitManufacturer'>Add manufacturer</button>
                    </form><hr>
                    <h3>Delete manufacturer</h3>
                    <form method='post'>
                        <input type='text' name='id' placeholder='id'>
                        <button name='deleteManufacturer'>Delete manufacturer</button>
                    </form>
                </div>
                <div class="changeBlock hidden" data-block="changeGallery">
                    <h1>Gallery</h1>
                    <h3>All galleries</h3>
                    <table border='1px'>
                        <tr>
                            <td>ID</td>
                            <td>img1</td>
                            <td>img2</td>
                            <td>img3</td>
                            <td>img4</td>
                            <td>img5</td>
                            <td>img6</td>
                            <td>img7</td>
                            <td>CarID</td>
                            <td>carname</td>
                        </tr>
                    <?php
                        //getting all users
                        $request = "SELECT img1 AS img1, img2 AS img2, img3 AS img3, img4 AS img4, img5 AS img5, img6 AS img6, 
                                    img7 AS img7, car.name as carname, car.ID as carid, gallery.id AS galleryID
                                    FROM gallery 
                                    JOIN car ON car.ID = gallery.CarID";
                        $result = $conn->query($request);
                        
                        while($row = $result->fetch_array())
                        {
                            echo "  <tr>
                                        <td>{$row['galleryID']}</td>
                                        <td>{$row['img1']}</td>
                                        <td>{$row['img2']}</td>
                                        <td>{$row['img3']}</td>
                                        <td>{$row['img4']}</td>
                                        <td>{$row['img5']}</td>
                                        <td>{$row['img6']}</td>
                                        <td>{$row['img7']}</td>
                                        <td>{$row['carid']}</td>
                                        <td>{$row['carname']}</td>
                                    </tr>";
                        }
                    ?>
                    </table><hr>
                    <h3>Add gallery</h3>
                    <form method='post'>
                        <input type='text' name='img1' placeholder='url to 1 image'>
                        <input type='text' name='img2' placeholder='url to 2 image'>
                        <input type='text' name='img3' placeholder='url to 3 image'>
                        <input type='text' name='img4' placeholder='url to 4 image'>
                        <input type='text' name='img5' placeholder='url to 5 image'>
                        <input type='text' name='img6' placeholder='url to 6 image'>
                        <input type='text' name='img7' placeholder='url to 7 image'>
                        <input type='text' name='carid' placeholder='car id'>
                        <button name='submitGallery'>Add gallery</button>
                    </form><hr>
                    <h3>Delete gallery</h3>
                    <form method='post'>
                        <input type='text' name='id' placeholder='id'>
                        <button name='deleteGallery'>Delete gallery</button>
                    </form>
                </div>
                <div class="changeBlock hidden" data-block="addNews">
                    <h1>News</h1>
                    <h3>Oops, there is nothing here</h3>
                </div>
                <div class="changeBlock hidden" data-block="generalInfo">
                    <h1>info</h1>
                    <?php
                        //getting main info about shop
                        $usersCount = $conn->query("SELECT COUNT(*) AS count FROM `user`")->fetch_array()['count'];
                        $carsCount = $conn->query("SELECT SUM(Quantity) AS count FROM options")->fetch_array()['count'];
                        $totalPrice = $conn->query("SELECT SUM(Quantity*price) AS total FROM options")->fetch_array()['total'];
                        $totalSales = $conn->query("SELECT SUM(orders) AS count FROM `user`")->fetch_array()['count'];
                        $totalEarned = $conn->query("SELECT SUM(totalWasted) AS count FROM `user`")->fetch_array()['count'];
                            
                        echo "  <table style='width: 70%'>
                                    <tr>
                                        <td><h3>Total users</h3></td>
                                        <td><h3>{$usersCount}</h3></td>
                                    <tr>
                                    <tr>
                                        <td><h3>Total cars</h3></td>
                                        <td><h3>{$carsCount}</h3></td>
                                    <tr>
                                    <tr>
                                        <td><h3>Total price of all cars</h3></td>
                                        <td><h3>$ {$totalPrice}</h3></td>
                                    <tr>
                                    <tr>
                                        <td><h3>Total cars sold</h3></td>
                                        <td><h3>{$totalSales}</h3></td>
                                    <tr>
                                    <tr>
                                        <td><h3>Total earned</h3></td>
                                        <td><h3>$ {$totalEarned}</h3></td>
                                    <tr>
                                    
                                </table>";
                        
                    
                    ?>
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
        
        //secure way to check user
        var hasPermision = "<?= $hasPermission ?>";
        if(hasPermision != 1)
        {
            $("#mainTable").html("У вас немає прав на цю панель. Зверніться до адміністратора.");
        }
    });
</script>

</html>

<?php
    
    //DB functions
    function deleteById($table, $id, $conn)
    {
        if(!empty($id) || !empty($table) || !empty($conn))
        {
            //deleting row with that id;
            echo ($conn == null)." 12"; 
            $result = $conn->query("DELETE FROM `{$table}` WHERE ID={$id}");
            
            if($result == 1) //if drop was correct
            {
                echo "  <script>
                            alert('Success!');
                        </script>";
            }
            
            reload();
        }
    }
        
    function changeColumnByID($table, $column, $id, $value, $conn)
    {
        if(!empty($id) || !empty($column) || !empty($table) || !empty($conn))
        {
            $result = $conn->query("UPDATE {$table} SET {$column} = {$value} WHERE id={$id}");
            if($result == 1)
            {
                echo "  <script>
                            alert('Success!');
                        </script>";
            }
            
            reload();
        }
    }
        
    //page function
    function reload()
    {
        echo "  <script>
                    location.replace('adminka.php');
                </script>";
    }
        
    function alert($msg)
    {
        echo "  <script>
                    alert('{$msg}');
                </script>";
    }
    
    //user
    if(isset($_POST['submitUser'])) //adding new user
    {
        //getting values
        $login = $_POST["login"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        
        if(!empty($login) || !empty($name) || !empty($email) || !empty($pass))
        {
            //inserting into db
            $result = $conn->query("INSERT INTO `user`(login, name, email, pass) VALUES('{$login}', '{$name}', '{$email}', '{$pass}')");
            if($result == 1) //if insert was correct
            {
                alert('Success!');
            }
            
            reload();
        }
    }
    if(isset($_POST['deleteUser'])) //adding new user
    {
        //getting values
        $id = $_POST["user_id"];
        deleteById('user', $id, $conn);
    }
    if(isset($_POST['rootUser'])) //making user admin
    {
        //getting values
        $id = $_POST["user_id"];
        changeColumnByID('user', 'admin', $id, 1, $conn);
        
    }
        
    //car
    if(isset($_POST['submitCar'])) //adding new car
    {
        //getting values
        $carname = $_POST["carName"];
        $caryear = $_POST["carYear"];
        $carimg = $_POST["carImg"];
        $carDescr = $_POST["description"];
        $carShortDescr = $_POST["shortDescription"];
        $manufacturerID = $_POST["manufacturerId"];
        
        if(!empty($carname) || !empty($caryear) || !empty($carimg) || !empty($carDescr) || !empty($carShortDescr) || !empty($manufacturerID))
        {
            //inserting into db
            $result = $conn->query("INSERT INTO car(name, year, img, Description, ShortDescription, ManufacturerID) 
                                    VALUES('{$carname}', {$caryear}, '{$carimg}', '{$carDescr}', '{$carShortDescr}', {$manufacturerID})");
            if($result == 1) //if insert was correct
            {
                alert('Success!');
            }
            
            reload();
        }
    }
    if(isset($_POST['deleteCar'])) //deleting car
    {
        //getting values
        $id = $_POST["id"];
        deleteById('car', $id, $conn);
    }
        
    //options
    if(isset($_POST['submitOption'])) //adding new option
    {
        //getting values
        $color = $_POST["Color"];
        $engine = $_POST["Engine"];
        $hp = $_POST["HP"];
        $disk = $_POST["Disk"];
        $quantity = $_POST["Quantity"];
        $price = $_POST["Price"];
        $carid = $_POST["CarID"];
        
        if(!empty($color) || !empty($engine) || !empty($hp) || !empty($disk) || !empty($quantity) || !empty($price) || !empty($carid))
        {
            //inserting into db
            $result = $conn->query("INSERT INTO options(Color, `Engine`, HP, Disk, Quantity, Price, CarID) 
                                    VALUES('{$color}', '{$engine}', {$hp}, {$disk}, {$quantity}, {$price}, {$carid})");
            if($result == 1) //if insert was correct
            {
                alert('Success!');
            }
            
            reload();
        }
    } 
    if(isset($_POST['deleteOption'])) //deleting option
    {
        //getting values
        $id = $_POST["id"];
        deleteById('options', $id, $conn);
    }
    if(isset($_POST['changeOption']))
    {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        changeColumnByID('options', 'Quantity', $id, $quantity, $conn); //setting new quantity
    }
        
    //manufacturers
    if(isset($_POST['submitManufacturer'])) //adding new manufacturer
    {
        //getting values
        $name = $_POST['name'];
        
        if(!empty($name))
        {
            //inserting into db
            $result = $conn->query("INSERT INTO manufacturer(Name) VALUES('{$name}')");
            if($result == 1) //if insert was correct
            {
                alert('Success!');
            }
            
            reload();
        }
    } 
    if(isset($_POST['deleteManufacturer']))
    {
        $id = $_POST['id'];
        deleteByID('manufacturer', $id, $conn);
    }
        
    //gallery
    if(isset($_POST['submitGallery'])) //adding new gallery
    {
        //getting values
        $img1 = $_POST['img1'];
        $img2 = $_POST['img2'];
        $img3 = $_POST['img3'];
        $img4 = $_POST['img4'];
        $img5 = $_POST['img5'];
        $img6 = $_POST['img6'];
        $img7 = $_POST['img7'];
        $carid = $_POST['carid'];
        
        if(!empty($img1) || !empty($img2) || !empty($img3) || !empty($img4) || !empty($img5) || !empty($img6) || !empty($img7) || !empty($carid))
        {
            //inserting into db
            $result = $conn->query("INSERT INTO gallery(img1, img2, img3, img4, img5, img6, img7, CarID) 
                                    VALUES('{$img1}', '{$img2}', '{$img3}', '{$img4}', '{$img5}', '{$img6}', '{$img7}', '{$carid}')");
            if($result == 1) //if insert was correct
            {
                alert('Success!');
            }
            
            //reload();
        }
    } 
    if(isset($_POST['deleteGallery']))
    {
        $id = $_POST['id'];
        deleteByID('gallery', $id, $conn);
    }
    
  //INSERT INTO options(Color, `Engine`, HP, Disk, Quantity, Price, car_ID) VALUES("Red", "V8", 396, 15, 10, 45000, 1)  
?>
