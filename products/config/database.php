<?php
class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $config = require 'config.php';  // Đọc thông tin cấu hình từ file config.php
        $dsn = $config['database']['dsn'];
        $username = $config['database']['username'];
        $password = $config['database']['password'];

        // Tạo kết nối PDO
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
