<form action="index.php?action=edit" method="POST">
    <input type="hidden" name="id" value="<?= $product['ID'] ?>">
    
    <label for="name">Tên sản phẩm:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
    
    <label for="price">Giá:</label>
    <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
    
    <button type="submit">Lưu</button>
</form>
