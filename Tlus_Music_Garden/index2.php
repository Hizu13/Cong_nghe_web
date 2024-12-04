<?php include 'header.php'; ?>
<?php include 'products.php'; ?>

<form action="index.php" method ="POST">
    <lable>"Tên sản phẩm"</lable>
    <input type="text" name="name" required>
    <lable>"Giá thành"</lable>
    <input type="text" name="price" required>
    <button type="submit" class="btn-add">Thêm mới</button>
    
</form>