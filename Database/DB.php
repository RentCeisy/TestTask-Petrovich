<?php

namespace Database;

use PDO;

class DB {

    private static $instance = null;
    public static $db_name = '';
    private static $db_host = '';
    public static $db_table = '';
    private static $db_user = '';
    private static $db_password = '';

    public static function getInstance()
    {
        if (null !== self::$instance) {
            return self::$instance;
        }
        return self::$instance = self::$instance = new PDO(
            'mysql:host=' . self::$db_host . ';dbname=' . self::$db_name,
            self::$db_user,
            self::$db_password,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );
    }

    private function __construct ()
    {

    }
}