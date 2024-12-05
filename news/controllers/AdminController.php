<?php
require_once 'models/User.php';

class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::getUserByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                if ($user['role'] == 1) {
                    header('Location: ?action=dashboard');  // Redirect vào trang admin
                } else {
                    header('Location: ?action=home');  // Redirect vào trang người dùng
                }
                exit;
            } else {
                echo "Invalid credentials.";
            }
        }
        include 'views/admin/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: ?action=admin_login');
        exit;
    }

    public function dashboard() {
        include 'views/admin/dashboard.php';
    }
}
?>
