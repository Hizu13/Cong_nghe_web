<?php
require_once 'models/News.php';
require_once 'models/Category.php';

class NewsController {
    // Hiển thị danh sách tin tức
    public function index() {
        $newsList = News::getAll(); // Lấy tất cả tin tức (bao gồm công khai và không công khai)
        include 'views/admin/news/index.php';
    }

    // Thêm tin tức
    public function add() {
        $categories = Category::getAll(); // Lấy tất cả danh mục
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $public = isset($_POST['public']) ? 1 : 0; // Kiểm tra xem tin tức có được công khai không
            News::add($title, $content, $category_id, $public); // Gọi phương thức thêm tin tức với tham số public
            header('Location: ?action=manage_news'); // Chuyển hướng về trang quản lý tin tức
            exit;
        }
        include 'views/admin/news/add.php'; // Hiển thị form thêm tin tức
    }

    // Chỉnh sửa tin tức
    public function edit($id) {
        $news = News::getById($id); // Lấy tin tức theo ID
        $categories = Category::getAll(); // Lấy tất cả danh mục
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $public = isset($_POST['public']) ? 1 : 0; // Kiểm tra xem tin tức có được công khai không
            News::update($id, $title, $content, $category_id, $public); // Cập nhật tin tức với thuộc tính public
            header('Location: ?action=manage_news'); // Chuyển hướng về trang quản lý tin tức
            exit;
        }
        include 'views/admin/news/edit.php'; // Hiển thị form chỉnh sửa tin tức
    }

    // Xóa tin tức
    public function delete($id) {
        News::delete($id); // Gọi phương thức xóa tin tức
        header('Location: ?action=manage_news'); // Chuyển hướng về trang quản lý tin tức
        exit;
    }
}
?>
