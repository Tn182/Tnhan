<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Thêm Tin Tức Mới</h2>
    <form action="themtintuc.php" method="post" enctype="multipart/form-data">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" required><br>

        <label for="content">Nội dung:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Thêm Tin Tức">
    </form>
</body>
</html>
