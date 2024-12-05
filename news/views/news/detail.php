<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($news['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($news['title']) ?></h1>
    <p><strong>Category:</strong> <?= htmlspecialchars($news['category_name']) ?></p>
    <p><?= nl2br(htmlspecialchars($news['content'])) ?></p>
    <a href="?action=home">Back to Home</a>
</body>
</html>