<?php

    namespace Models;

    class Manufacturer extends DBmanager
    {
        public static $table = 'manufacturer';

        public function __construct($conn)
        {
            parent::__construct($conn);
        }

        public static function all($conn, $rule = null)
        {
            return self::allRecords($conn, self::$table, $rule);
        }
    }
?>