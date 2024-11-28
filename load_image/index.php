<form action="upload.php" method="post" enctype="multipart/form-data">
Chọn ảnh để tải lên:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Tải lên Ảnh" name="submit">
</form>
<?php
if ($_FILES["fileToUpload"]["size"] > 500000) { // Ví dụ, giới hạn là 500 KB
echo "Xin lỗi, tệp tin của bạn quá lớn.";
exit;
}
?>