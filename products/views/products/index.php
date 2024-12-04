<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo htmlspecialchars($product['name']); ?> - $<?php echo htmlspecialchars($product['price']); ?>
                <a href="?action=delete&id=<?php echo $product['id']; ?>">Delete</a>
                <a href="?action=edit&id=<?php echo $product['id']; ?>">Edit</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="post" action="?action=add">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" name="price" placeholder="Product Price" required>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>