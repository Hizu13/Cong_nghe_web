<?php
session_start();

require_once 'controllers/HomeController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/NewsController.php';

$action = $_GET['action'] ?? 'home';

echo $action;
switch ($action) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'detail_news':
        $controller = new HomeController();
        $id = $_GET['id'] ?? 0;
        $controller->detail($id);
        break;
    case 'admin_login':
        $controller = new AdminController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AdminController();
        $controller->logout();
        break;
    case 'manage_news':
        $controller = new NewsController();
        $controller->index();
        break;
    case 'add_news':
        $controller = new NewsController();
        $controller->add();
        break;
    case 'edit_news':
        $controller = new NewsController();
        $id = $_GET['id'] ?? 0;
        $controller->edit($id);
        break;
}
?>
