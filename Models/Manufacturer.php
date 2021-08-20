<?php

    namespace Models;

    class Manufacturer extends DBmanager
    {
        public function __construct($conn)
        {
            parent::__construct($conn);
        }

        public static function all($conn)
        {
            $manufacturers = [];
            
            $request = "SELECT * FROM manufacturer";
            $result = $conn->query($request);
            
            while($row = $result->fetch_array()) //fetching request to array
            {
                array_push($manufacturers, $row);
            }
            
            return $manufacturers;
        }
    }
?>