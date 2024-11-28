<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<?php
session_start();
if(!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['name' => 'Sản phẩm 1', 'price' => 1000],
        ['name' => 'Sản phẩm 2', 'price' => 2000],
        ['name' => 'Sản phẩm 3', 'price' => 3000],

    ];
}
?>
<body>
    <?php
        include './template/Header.php';
    ?>
    <main>
        <div class="container mt-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Thêm mới</button>
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th class="tablehead">Sản phẩm</th>
                        <th class="tablehead">Giá thành</th>
                        <th class="tablehead">Sửa</th>
                        <th class="tablehead">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['products'] as $id => $product) ?>
                        <tr>
                            <td> <?= htmlspecialchars($product['name']) ?></td>
                            <td><?= number_format($product['price']) ?> VND</td>
                            <td> </td>
                        </tr>
                </tbody>
            </table>

        </div>
    </main>
    <?php
        include './template/Footer.php';
    ?>
    <!-- Modal Thêm mới sản phẩm -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Thêm sản phẩm mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá thành</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add_product" class="btn btn-success">Thêm mới</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>