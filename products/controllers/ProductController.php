<?php
require_once 'models/Product.php';

class ProductController
{
    public function index()
    {
        $products = Product::getAll();
        include 'views/products/index.php';
    }

    public function add($name, $price)
    {
        Product::add($name, $price);
        $this->index();
    }

    public function delete($id)
    {
        Product::delete($id);
        $this->index();
    }

    public function update($id, $name, $price)
    {
        Product::update($id, $name, $price);
        $this->index();
    }

    public function edit($id)
    {
        $product = Product::getById($id);
        include 'views/products/edit.php';
    }
}
?>