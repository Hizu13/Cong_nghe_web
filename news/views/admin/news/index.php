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
