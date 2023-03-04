<?php
class db {
    private static $connection;

    private static function connect() {
        $host = 'db';
        $database = 'sys';
        $username = 'root';
        $password = 'root';

        $dsn = "mysql:host=$host;dbname=$database";

        try {
            self::$connection = new PDO($dsn, $username, $password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage() . ' | ' . $dsn);
        }
    }

    public static function query($sql, $params = array()) {
        if (!self::$connection) {
            self::connect();
        }

        return 'hola';

        try {
            $statement = self::$connection->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('Query failed: ' . $e->getMessage());
        }
    }
}