<?php
class Product
{
    public static function getAll()
    {
        return $_SESSION['products'] ?? [];
    }

    public static function add($name, $price)
    {
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [];
        }

        $newProduct = [
            'ID' => count($_SESSION['products']) + 1,
            'name' => $name,
            'price' => $price,
        ];
        $_SESSION['products'][] = $newProduct;
    }

    public static function delete($id)
    {
        if (isset($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $key => $product) {
                if ($product['ID'] == $id) {
                    unset($_SESSION['products'][$key]);
                    $_SESSION['products'] = array_values($_SESSION['products']);
                    break;
                }
            }
        }
    }

    public static function update($id, $name, $price)
    {
        if (isset($_SESSION['products'])) {
            foreach ($_SESSION['products'] as &$product) {
                if ($product['ID'] == $id) {
                    $product['name'] = $name;
                    $product['price'] = $price;
                    break;
                }
            }
        }
    }

    public static function getById($id)
    {
        foreach ($_SESSION['products'] as $product) {
            if ($product['ID'] == $id) {
                return $product;
            }
        }
        return null;
    }
}
?>
