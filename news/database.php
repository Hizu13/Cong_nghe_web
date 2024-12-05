<?php

class Database {
    private static $instance = null; // Biến tĩnh chứa instance của lớp
    private $host = 'localhost'; // Địa chỉ máy chủ cơ sở dữ liệu
    private $db_name = 'tintuc'; // Tên cơ sở dữ liệu
    private $username = 'root'; // Tên người dùng CSDL
    private $password = ''; // Mật khẩu người dùng CSDL
    private $conn; // Biến chứa kết nối

    // Hàm kết nối tới cơ sở dữ liệu
    private function __construct() {
        try {
            // Tạo kết nối
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            // Thiết lập lỗi PDO để ném exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }

    // Hàm lấy instance của Database (Singleton Pattern)
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Hàm lấy kết nối
    public function getConnection() {
        return $this->conn;
    }
}

?>
