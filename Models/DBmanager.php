<?php

    namespace Models;

    class DBmanager
    {
        public $conn;
        public static $table;
        
        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public static function all($conn, $rule = null)
        {

        }

        protected static function allRecords($conn, $table, $rule)
        {
            $result = [];

            $query = "SELECT * FROM `".$table."`";
            $query .= ($rule == null) ? $rule : ' WHERE '.$rule;
            $rows = $conn->query($query);

            while($row = $rows->fetch_array())
            {
                $result[] = $row;
            }

            return $result;
        }
    }
?>