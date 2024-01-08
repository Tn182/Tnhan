<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "Tnhan182";
    $dbname = "webgiamcantangcan";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    if (empty($email) && empty($phone)) {
        echo "Email hoặc số điện thoại không được để trống.";
    } else {


      $checkQuery = "SELECT * FROM user WHERE email = '$email' OR phone = '$phone'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            echo "Email hoặc số điện thoại đã được sử dụng. Vui lòng chọn thông tin đăng ký khác.";
        } else {
            // Thực hiện câu lệnh INSERT
            $sql = "INSERT INTO user (username, password, email, phone) VALUES ('$username', '$password', '$email', '$phone')";
            if ($conn->query($sql) === TRUE) {
                echo "Đăng ký thành công";
            } else {
                echo "Lỗi khi thực hiện đăng ký: " . $conn->error;
            }
        }
    }

    $conn->close();
}
?>