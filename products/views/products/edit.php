<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post" action="?action=update&id=<?php echo $product['id']; ?>">
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        <input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>