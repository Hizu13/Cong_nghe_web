<?php
require_once 'database.php';

class Product
{
    private static function connect()
    {
        return Database::getInstance()->getConnection();
    }

    public static function getAll()
    {
        $db = self::connect();
        $stmt = $db->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add($name, $price)
    {
        $db = self::connect();
        $stmt = $db->prepare('INSERT INTO products (name, price) VALUES (:name, :price)');
        $stmt->execute(['name' => $name, 'price' => $price]);
    }

    public static function delete($id)
    {
        $db = self::connect();
        $stmt = $db->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public static function update($id, $name, $price)
    {
        $db = self::connect();
        $stmt = $db->prepare('UPDATE products SET name = :name, price = :price WHERE id = :id');
        $stmt->execute(['id' => $id, 'name' => $name, 'price' => $price]);
    }

    public static function getById($id)
    {
        $db = self::connect();
        $stmt = $db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>