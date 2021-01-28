<?php class Database
{
    private static $connectionParameters = [
        "localhost" => ["user" => "root", "db_name" => "tp_php", "password" => "", "host" => "localhost"],
        "default" =>   ["user" => "root", "db_name" => "tp_php", "password" => "", "host" => "localhost"]
    ];

    private static $cont = null;

    public function __construct()
    {
        die('Init function is not allowed');
    }
    public static function connect()
    {
        if (null == self::$cont) {
            $address_port = explode(":", $_SERVER['HTTP_HOST']);
            $address = reset($address_port);

            if (!isset(self::$connectionParameters[$address])) {
                $address = "default";
            }

            try {
                self::$cont = new PDO('mysql:host=' . self::$connectionParameters[$address]["host"] . ';dbname='. self::$connectionParameters[$address]["db_name"],
                    self::$connectionParameters[$address]["user"],
                    self::$connectionParameters[$address]["password"]
                );
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
