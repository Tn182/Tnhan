<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Tnhan182";
$dbname = "webgiamcantangcan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý xóa tin tức
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    
    // Kiểm tra xem tin tức tồn tại hay không
    $checkExistQuery = "SELECT id FROM news WHERE id = $idToDelete";
    $resultExist = $conn->query($checkExistQuery);

    if ($resultExist->num_rows > 0) {
        // Tin tức tồn tại, thực hiện xóa
        $sqlDelete = "DELETE FROM news WHERE id = $idToDelete";

        if ($conn->query($sqlDelete) === TRUE) {
            echo "Xóa tin tức thành công!";
        } else {
            echo "Lỗi khi xóa tin tức: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy tin tức để xóa.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
