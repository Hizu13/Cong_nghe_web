<?php
session_start();
require_once 'controllers/ProductController.php';

$controller = new ProductController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'add':
        $controller->add($_POST['name'], $_POST['price']);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'update':
        $controller->update($_GET['id'], $_POST['name'], $_POST['price']);
        break;
    default:
        $controller->index();
        break;
}
?>