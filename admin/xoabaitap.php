<?php
// Kết nối đến cơ sở dữ liệu (Chắc chắn bạn đã thực hiện kết nối trước đó)
include 'connection.php';

// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // Xử lý yêu cầu xóa
    if ($_POST['action'] === 'delete' && isset($_POST['id'])) {
        $id_to_delete = $_POST['id'];

        // Xóa bài tập từ cơ sở dữ liệu
        $sql_delete = "DELETE FROM baitapsuckhoe WHERE id = $id_to_delete";

        if ($conn->query($sql_delete) === TRUE) {
            // Bài tập đã được xóa thành công
            echo "Bài tập đã được xóa thành công!";
        } else {
            // Xảy ra lỗi khi xóa
            echo "Lỗi: " . $conn->error;
        }
    }
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
