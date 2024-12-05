<?php
require_once 'models/News.php';
require_once 'models/Category.php';

class HomeController {
    public function index() {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        $newsList = [];

        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];

            // Nếu là quản trị viên, hiển thị tất cả tin tức
            if ($user['role'] == 1) {
                // Quản trị viên có thể xem tất cả tin tức
                $newsList = News::getAll();
            } else {
                // Người dùng bình thường chỉ có thể xem tin tức công khai
                $newsList = News::getPublicNews(); // Bạn có thể thay đổi hàm này trong model để lọc tin tức công khai.
            }
        } else {
            // Nếu người dùng chưa đăng nhập, chỉ hiển thị tin tức công khai
            $newsList = News::getPublicNews();
        }

        include 'views/home/index.php';
    }

    public function detail($id) {
        // Kiểm tra nếu người dùng đã đăng nhập
        $news = News::getById($id);

        // Nếu không có tin tức hoặc tin tức không công khai, bạn có thể xử lý như redirect về trang chủ hoặc thông báo lỗi
        if (!$news) {
            header('Location: ?action=home');
            exit;
        }

        include 'views/news/detail.php';
    }

    public function search() {
        // Kiểm tra nếu người dùng đã đăng nhập
        $newsList = [];
        $keyword = $_GET['keyword'] ?? '';

        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];

            // Nếu là quản trị viên, tìm kiếm tất cả tin tức
            if ($user['role'] == 1) {
                $newsList = News::searchByKeyword($keyword);
            } else {
                // Người dùng bình thường chỉ tìm kiếm tin tức công khai
                $newsList = News::searchPublicNews($keyword);
            }
        } else {
            // Nếu người dùng chưa đăng nhập, tìm kiếm tin tức công khai
            $newsList = News::searchPublicNews($keyword);
        }

        include 'views/home/index.php';
    }
}
?>
