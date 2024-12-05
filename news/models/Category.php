<?php
require_once 'Database.php';

class Category {
    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
