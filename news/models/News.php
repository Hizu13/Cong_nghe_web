<?php
require_once 'Database.php';

class News {
    // Lấy tất cả tin tức công khai
    public static function getPublicNews() {
        $db = Database::getInstance()->getConnection();
        // Lọc chỉ tin tức có public = 1
        $stmt = $db->query('SELECT * FROM news WHERE public = 1');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Tìm kiếm tin tức công khai theo từ khóa
    public static function searchPublicNews($keyword) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM news WHERE (title LIKE :keyword OR content LIKE :keyword) AND public = 1');
        $stmt->execute(['keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tất cả tin tức, bao gồm tên danh mục
    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query('SELECT news.*, categories.name AS category_name FROM news LEFT JOIN categories ON news.category_id = categories.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tin tức theo ID, bao gồm tên danh mục
    public static function getById($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT news.*, categories.name AS category_name FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE news.id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tìm kiếm tin tức theo từ khóa, bao gồm tên danh mục
    public static function searchByKeyword($keyword) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT news.*, categories.name AS category_name FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE news.title LIKE :keyword OR news.content LIKE :keyword');
        $stmt->execute(['keyword' => '%'.$keyword.'%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm tin tức mới
    public static function add($title, $content, $category_id, $public = 0) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('INSERT INTO news (title, content, category_id, public) VALUES (:title, :content, :category_id, :public)');
        $stmt->execute(['title' => $title, 'content' => $content, 'category_id' => $category_id, 'public' => $public]);
    }

    // Cập nhật tin tức
    public static function update($id, $title, $content, $category_id, $public) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('UPDATE news SET title = :title, content = :content, category_id = :category_id, public = :public WHERE id = :id');
        $stmt->execute(['id' => $id, 'title' => $title, 'content' => $content, 'category_id' => $category_id, 'public' => $public]);
    }

    // Xóa tin tức
    public static function delete($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('DELETE FROM news WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
?>
