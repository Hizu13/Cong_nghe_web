<!DOCTYPE html>
<html>
<head>
    <title>Add News</title>
</head>
<body>
    <h1>Add News</h1>
    <form method="post">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>">
                    <?= htmlspecialchars($category['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Add</button>
    </form>
</body>
</html>