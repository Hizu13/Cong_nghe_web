<?php
session_start();
require_once 'controllers/ProductController.php';

$controller = new ProductController();

// Xác định action từ URL (mặc định là 'index')
$action = $_GET['action'] ?? 'index';

// Điều hướng dựa trên action
switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->add($_POST['name'], $_POST['price']);
        }
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update($_GET['id'], $_POST['name'], $_POST['price']);
        }
        break;
    default:
        $controller->index();
        break;
}
?>
