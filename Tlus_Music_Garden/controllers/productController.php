<?php
require_once 'models/Products.php';

class ProductController
{
    public function index()
    {
        $products = Product::getAll();
        include 'views/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars(trim($_POST['name']));
            $price = intval($_POST['price']);
            Product::add($name, $price);
            header('Location: index.php');
            exit();
        }
        include 'views/add.php';
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            Product::delete($_GET['id']);
        }
        header('Location: index.php');
        exit();
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id']);
            $name = htmlspecialchars(trim($_POST['name']));
            $price = intval($_POST['price']);
            Product::update($id, $name, $price);
            header('Location: index.php');
            exit();
        } elseif (isset($_GET['id'])) {
            $product = Product::getById($_GET['id']);
            include 'views/edit.php';
        }
    }
}
?>
