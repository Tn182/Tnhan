<?php
include 'connection.php'; // Thay đổi thành file cấu hình của bạn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenBaiTap = $_POST['ten_bai_tap'];
    $moTa = $_POST['mo_ta'];
    $hinhAnh = 'uploads/' . basename($_FILES['hinh_anh']['name']);
    move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $hinhAnh);
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