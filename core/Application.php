<?php
namespace Core;

class Application
{
    public static $config;
    public static $db;

    public function __construct($config)
    {
        self::$config = $config;
        self::connectDb();
    }

    private function connectDb()
    {
        $config = self::$config['db'];

        $dsn = "mysql:host={$config['host']};dbname={$config['name']};charset=utf8";
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        self::$db = new \PDO($dsn, $config['user'], $config['password'], $opt);
    }
}