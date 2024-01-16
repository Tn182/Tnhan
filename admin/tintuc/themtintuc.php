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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức</title>
    <style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    
}

h2 {
    color: #007bff;
}

form {
    max-width: 600px;
    margin: 20px auto;
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
input[type="file"],
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>  
<h2>Thêm Tin Tức Mới</h2>
<form method="post" action="tintuc.php" enctype="multipart/form-data">
    <label for="title">Tiêu đề:</label>
    <input type="text" id="title" name="title" required><br>

    <label for="content">Nội dung:</label>
    <textarea id="content" name="content" required></textarea><br>

    <label for="image">Chọn ảnh:</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <input type="submit" value="Thêm Tin Tức">
</form>
</body>
</html>
