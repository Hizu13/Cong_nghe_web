<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
</head>
<body>
    <h1>Edit News</h1>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($news['title']) ?>" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?= htmlspecialchars($news['content']) ?></textarea>

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= $category['id'] == $news['category_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
```html
<!DOCTYPE html>
<html>
<head>
    <title>Manage News</title>
</head>
<body>
    <h1>News Management</h1>
    <a href="?action=add_news">Add News</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsList as $news): ?>
                <tr>
                    <td><?= $news['id'] ?></td>
                    <td><?= htmlspecialchars($news['title']) ?></td>
                    <td><?= htmlspecialchars($news['category_name']) ?></td>
                    <td>
                        <a href="?action=edit_news&id=<?= $news['id'] ?>">Edit</a>
                        <a href="?action=delete_news&id=<?= $news['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>