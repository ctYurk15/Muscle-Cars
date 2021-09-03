<?php

    include '../dbdata.php';
    include "../vendor/autoload.php";

    use Models\DBmanager as DBmanager;
    use Models\User as User;

    $command = $_POST['action'];

    //what user wants to get
    if($command == "is_loggined")
    {
        if(isset($_COOKIE['login']))
        {
            //updating cookies
            $login = $_COOKIE['login'];

            setcookie("login", "", time()-100, '/'); //discontinue old cookie
            setcookie("login", $login, time()+(60*60*24), '/'); //creating new one
        }
        echo json_encode(isset($_COOKIE['login']));
    }
    else if($command == "account_info")
    {
        $user = new User($conn, $_COOKIE['login']);
        $result = [];
        
        //forming result
        $result['login'] = $user->getUserColumn('login');
        $result['name'] = $user->getUserColumn('name');
        $result['email'] = $user->getUserColumn('email');
        $result['address'] = $user->getUserColumn('address');
        $result['avatar'] = $user->getUserColumn('avatar');
        $result['orders'] = $user->getUserColumn('orders');
        //$result['pass'] = $user->getUserColumn('pass');
        
        echo json_encode($result);
    }
    else if($command == "get_user_avatar")
    {
        $result = [];

        if(isset($_COOKIE['login']))
        {
            $user = new User($conn, $_COOKIE['login']);
            $avatar = $user->getUserColumn("avatar");

            $result = ['loggined' => true, "avatar" => $avatar];
        }
        else 
        {
            $result = ['loggined' => false];
        }

        echo json_encode($result);
    }
    
?>