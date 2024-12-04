<?php
class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $config = require 'config.php';
        $dsn = $config['database']['dsn'];
        $username = $config['database']['username'];
        $password = $config['database']['password'];
        $this->connection = new PDO($dsn, $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
?>