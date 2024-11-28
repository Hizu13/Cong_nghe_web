<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</title>
</head>
<body>
    <h1>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>
    
    <div class="flower-container">
        <?php 
        include 'flower.php';
        foreach ($flowers as $index => $value){
            echo "<div style='margin-bottom: 20px;'>";
            echo $value['name'];
            echo $value['description'];
            foreach ($value['images'] as $image){
                echo "<img src='images/".$image."' alt=''>";
            }
          }
            ?>
        </tbody>
</body>
</html>