<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Tnhan182";
$dbname = "webgiamcantangcan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý khi người dùng submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Xử lý tải lên ảnh
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra nếu file ảnh có vẻ hợp lệ
    $uploadOk = 1;

    // Kiểm tra kích thước file
    if ($_FILES["image"]["size"] > 500000) {
        echo "Xin lỗi, file của bạn quá lớn.";
        $uploadOk = 0;
    }

    // Kiểm tra loại file
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo "Xin lỗi, chỉ chấp nhận file JPG, JPEG, PNG.";
        $uploadOk = 0;
    }

    // Kiểm tra xem đã có lỗi nào xuất hiện chưa
    if ($uploadOk == 0) {
        echo "Xin lỗi, file của bạn không được tải lên.";
    } else {
        // Nếu mọi thứ đều đúng, thử tải lên file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Thêm tin tức vào cơ sở dữ liệu
            $sqlInsert = "INSERT INTO news (title, content, image) VALUES ('$title', '$content', '$targetFile')";
            if ($conn->query($sqlInsert) === TRUE) {
                echo "Thêm tin tức thành công!";
            } else {
                echo "Lỗi: " . $sqlInsert . "<br>" . $conn->error;
            }
        } else {
            echo "Xin lỗi, có lỗi xảy ra khi tải lên file.";
        }
    }
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
