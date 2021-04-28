<?php

    class User
    {
        public $conn;
        
        public function __construct($conn)
        {
            $this->conn = $conn; 
        }
        
        public function getUserByLogin($login)
        {
            $user = []; 
            $user = $this->conn->query("SELECT * FROM user WHERE login='{$login}'")->fetch_array();
            return $user;
        }
        
        public function getUserColumn($login, $columnName)
        {
            $column = ""; 
            $column = $this->conn->query("SELECT {$columnName} FROM user WHERE login='{$login}'")->fetch_array()[$columnName];
            return $column;
        }
        
        public function increaseUserOrders($login, $value)
        {
            $this->conn->query("UPDATE `user` SET orders = orders+{$value} WHERE login='{$login}'");
        }
        
        public function addUser($login, $name, $email, $pass)
        {
            $this->conn->query("INSERT INTO `user`(login, name, email, pass) VALUES('{$login}', '{$name}', '{$email}', '{$pass}')");
        }
        
    }

?>