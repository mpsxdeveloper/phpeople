<?php

class ConnectionFactory {

    public static function connect() {
        $dbname = "agenda";
        $dbhost = "localhost";
        $dbuser = "";
        $dbpasswd = "";
        try {
            $connection = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpasswd);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
        return $connection;
    }

    public static function disconnect($conn) {
        $this->connection = $conn;
    }
    
}
