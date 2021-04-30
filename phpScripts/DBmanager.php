<?php
    class DBmanager
    {
        public $conn;
        
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
    }
?>