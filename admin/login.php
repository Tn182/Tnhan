<?php
session_start();

// Include file kết nối CSDL
include_once('connection.php');



// Xử lý đăng nhập khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Thực hiện truy vấn đến CSDL để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM user WHERE username = '$input_username' AND password = '$input_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lưu session và chuyển hướng đến trang index.php
        $row = $result->fetch_assoc();
        $_SESSION['admin_id'] = $row['admin_id'];
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Thông tin đăng nhập không chính xác.";
    }
}

// Đóng kết nối CSDL
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>

    <h2>Đăng nhập</h2>

    <?php
    if (isset($error_message)) {
        echo '<p style="color:red;">' . $error_message . '</p>';
    }
    ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Đăng nhập">
    </form>

</body>
</html>