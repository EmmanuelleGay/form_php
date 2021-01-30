<?php

/**
 * Database
 * Provides a PDO connection object
 */
class Database
{
    // Database connection parameters, depending on HTTP_HOST
    private static $connectionParameters = [
        "localhost" => ["user" => "root", "db_name" => "tp_php", "password" => "", "host" => "localhost"],
        "default" =>   ["user" => "", "db_name" => "", "password" => "", "host" => ""]
    ];

    private static $conn = null; // Connection object
    
    /**
     * connect
     *  connect to a database, return resulting connection
     * @return PDO connection object
     */
    public static function connect() {
        if (self::$conn == null) {
            $address_port = explode(":", $_SERVER['HTTP_HOST']);    // 
            $address = reset($address_port);                        // get host address, without the port

            if (!isset(self::$connectionParameters[$address])) { 
                $address = "default"; // if no parameters specified for current host, revert to defaults
            }

            try {
                self::$conn = new PDO(
                    'mysql:host=' . self::$connectionParameters[$address]["host"] . ';dbname=' . self::$connectionParameters[$address]["db_name"],
                    self::$connectionParameters[$address]["user"],
                    self::$connectionParameters[$address]["password"]
                );
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conn;
    }

    public static function disconnect() {
        self::$conn = null;
    }
}
