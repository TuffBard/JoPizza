<?php
    namespace App\Table;
    use \mysqli;
    class Database {
        private static $host = "127.0.0.1";
        private static $user = "root";
        private static $password = "";
        private static $db = "jopizza";
        private static $pdo;

        public static function getDb(){
            if(!isset(self::$pdo)){
                self::$pdo = new mysqli(self::$host, self::$user, self::$password, self::$db);
            }
            return self::$pdo;
        }

        public static function select($query){
            $mysqli = self::getDb();
            return $mysqli->query($query);
        }
    }
?>