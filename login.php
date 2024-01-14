<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    $servername = "127.0.0.1";
    $username = "root";
    $password = "Tnhan182";
    $dbname = "webgiamcantangcan";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape các giá trị nhập từ người dùng để ngăn chặn SQL Injection
    $input = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Sử dụng prepare statement để ngăn chặn SQL Injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE (email = ? OR phone = ?)");
    $stmt->bind_param("ss", $input, $input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Kiểm tra mật khẩu sử dụng password_verify
        if (password_verify($password, $row['password'])) {
            // Đăng nhập thành công, lưu thông tin vào session
            $_SESSION['iduser'] = $row['iduser'];
            $_SESSION['username'] = $row['username'];

            // Chuyển hướng đến trang dashboard hoặc trang cần thiết
            header("Location: dashboarduser.php");
            exit();
        } else {
            // Sai mật khẩu
            echo "Sai mật khẩu";
        }
    } else {
        // Tên đăng nhập không tồn tại
        echo "Tên đăng nhập không tồn tại";
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>