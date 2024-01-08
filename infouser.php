<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nhập Thông Tin Người Dùng</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<body>
    <?php
    session_start();
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (isset($_SESSION['iduser'])) {
        // Kiểm tra xem người dùng đã cập nhật thông tin hay chưa
        if (isset($_SESSION['updated'])) {
            if ($_SESSION['updated']) {
                // Hiển thị thông báo đã cập nhật thông tin
                echo '<p style="color: green;">Thông tin đã được cập nhật thành công!</p>';
            } else {
                // Hiển thị thông báo chưa cập nhật thông tin
                echo '<p style="color: red;">Bạn chưa cập nhật thông tin!</p>';
            }

            // Reset session variable to avoid showing the message on subsequent visits
            unset($_SESSION['updated']);
        }

        // Hiển thị form nhập thông tin
    ?>
        <h1>Nhập Thông Tin Người Dùng</h1>

        <form action="process_info.php" method="post">
            <label for="height">Chiều cao (cm):</label>
            <input type="number" name="height" required><br>

            <label for="weight">Cân nặng (kg):</label>
            <input type="number" name="weight" required><br>

            <label for="gender">Giới tính:</label>
            <select name="gender" required>
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
                <option value="other">Khác</option>
            </select><br>

            <label for="birthdate">Ngày sinh:</label>
            <input type="date" name="birthdate" required><br>

            <button type="submit">Lưu thông tin</button>
        </form>
    <?php
    } else {
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        header("Location: login_register.html");
        exit();
    }
    ?>
</body>
</html>