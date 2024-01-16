<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenBaiTap = $_POST['ten_bai_tap'];
    $moTa = $_POST['mo_ta'];

    // Xử lý tải lên hình ảnh
    $hinhAnh = 'uploads/' . basename($_FILES['hinh_anh']['name']);
    move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $hinhAnh);

    // Lấy đường dẫn video từ trường nhập liệu
    $video = $_POST['video_url'];

    $mucDo = $_POST['muc_do'];

    $sql = "INSERT INTO BaiTapSucKhoe (ten_bai_tap, mo_ta, hinh_anh, video, muc_do) VALUES ('$tenBaiTap', '$moTa', '$hinhAnh', '$video', '$mucDo')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm bài tập thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Tập Sức Khỏe</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

h2 {
    color: #007bff;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
input[type="file"],
input[type="submit"],
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
    padding: 12px 16px;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <h2>Thêm Bài Tập Sức Khỏe Mới</h2>

    <form method="post" action="thembaitapsuckhoe.php" enctype="multipart/form-data">
        <label for="ten_bai_tap">Tên Bài Tập:</label>
        <input type="text" id="ten_bai_tap" name="ten_bai_tap" required><br>

        <label for="mo_ta">Mô Tả:</label>
        <textarea id="mo_ta" name="mo_ta" required></textarea><br>

        <label for="hinh_anh">Hình Ảnh:</label>
        <input type="file" id="hinh_anh" name="hinh_anh" accept="image/*" ><br>

        <label for="video_url">Đường Dẫn Video (hoặc URL):</label>
        <input type="text" id="video_url" name="video_url" ><br>

        <label for="muc_do">Mức Độ:</label>
        <input type="text" id="muc_do" name="muc_do" ><br>

        <input type="submit" value="Thêm Bài Tập">
    </form>
</body>
</html>
