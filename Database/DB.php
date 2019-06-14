<?php

namespace Database;

use PDO;

class DB {

    private static $instance = null;
    public static $db_name = 'test';
    private static $db_host = 'localhost';
    private static $db_user = 'rent';
    private static $db_password = 'rhtfnbdyjcnm';

    public static function getInstance()
    {
        if (null != self::$instance) {
            return self::$instance;
        }
        return new self;
    }

    private function __construct () {
        try {
            self::$instance = new PDO(
                'mysql:host=' . self::$db_host . ';dbname=' . self::$db_name,
                self::$db_user,
                self::$db_password,
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
            );
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}