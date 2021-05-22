<?php

    class User extends DBmanager
    {
        public $login;
        
        public function __construct($conn, $login)
        {
            parent::__construct($conn);
            $this->login = $login;
        }
        
        public function getUserInfo()
        {
            $user = []; 
            $user = $this->conn->query("SELECT * FROM user WHERE login='{$this->login}'")->fetch_array();
            return $user;
        }
        
        public function getUserColumn($columnName)
        {
            $column = ""; 
            $column = $this->conn->query("SELECT {$columnName} FROM user WHERE login='{$this->login}'")->fetch_array()[$columnName];
            return $column;
        }
        
        public function increaseUserOrders($value)
        {
            $this->conn->query("UPDATE `user` SET orders = orders+{$value} WHERE login='{$this->login}'");
        }
        
        public function increaseUserWasted($value)
        {
            $this->conn->query("UPDATE `user` SET totalWasted = totalWasted+{$value} WHERE login='{$this->login}'");
        }
        
        public function addUser($login, $name, $email, $pass)
        {
            $this->conn->query("INSERT INTO `user`(login, name, email, pass) VALUES('{$login}', '{$name}', '{$email}', '{$pass}')");
        }
        
        public function fullUserUpdate($login, $name, $email, $address, $pass, $avatar)
        {
            $this->conn->query("UPDATE `user` 
                    SET login = '{$login}', 
                        name = '{$name}', 
                        address = '{$address}',
                        email = '{$email}',
                        pass = '{$pass}',
                        avatar = '{$avatar}'
                    WHERE login='{$this->login}'");
        }
        
    }

?>