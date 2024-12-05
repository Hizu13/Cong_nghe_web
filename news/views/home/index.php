<!DOCTYPE html>
<html>
<head>
    <title>News Portal</title>
</head>
<body>
    <h1>Latest News</h1>
    <form method="get">
        <input type="text" name="keyword" placeholder="Search news...">
        <button type="submit">Search</button>
    </form>
    <ul>
        <?php foreach ($newsList as $news): ?>
            <li>
                <a href="?action=detail_news&id=<?= $news['id'] ?>">
                    <?= htmlspecialchars($news['title']) ?>
                </a>
                <p>Category: <?= htmlspecialchars($news['category_name']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
