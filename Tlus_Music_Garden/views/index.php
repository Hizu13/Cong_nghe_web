<?php include 'views/header.php'; ?>
<main>
    <a href="index.php?action=add" class="btn-add">Thêm sản phẩm mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Giá thành</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['ID'] ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['price']) ?> VND</td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $product['ID'] ?>" class="btn btn-edit">✏️</a>
                    </td>
                    <td>
                        <a href="index.php?action=delete&id=<?= $product['ID'] ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">🗑️</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include 'footer.php'; ?>
