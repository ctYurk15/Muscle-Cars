<?php
    include '../dbdata.php';
    include 'generalScripts.php';    
    include "../vendor/autoload.php";

    use Models\DBmanager as DBmanager;
    use Models\User as User;
    use Models\Mailer as Mailer;

    //getting registration values
    $login = $_POST['login'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];
    $agreed = $_POST['agreed'];
    
    //validating data
    $error = false;
    if($pass != $rpass) //if passwords don`t match
    {
        echo "Паролі не співпадають";
        $error = true;
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Пошта не є коректною";
        $error = true;
    }

    if($agreed != "yes") //agree button
    {
        echo "Погодьтесь з нашими правилами";
        $error = true;
    }

    if(empty($login) || empty($name) || empty($email) || empty($pass) || empty($rpass) || empty($agreed)) //empty fields
    {
        echo "Заповніть будь ласка усі поля";
        $error = true;       
    }

    //if there is already user with that login 
    $countL = $conn->query("SELECT COUNT(*) AS c FROM `user` WHERE login='{$login}'")->fetch_array()['c'];
    if($countL > 0)
    {
        echo "Уже є користувач з логіном {$login}";
        $error = true;
    }

    //if there is already user with that login 
    $countM = $conn->query("SELECT COUNT(*) AS c FROM `user` WHERE email='{$email}'")->fetch_array()['c'];
    if($countM > 0)
    {
        echo "Уже є користувач з поштою {$email}";
        $error = true;
    }

    if(!$error) //if all were correct
    {
        $user = new User($conn, "");
        $user->addUser($login, $name, $email, hash('sha256', $pass));

        //sending email about registration
        Mailer::RegistrationMail($email);
        
        createCookie("login", $login, (60*60*24), '../account.html');  //setting cookie for next 1 day
    }
?>