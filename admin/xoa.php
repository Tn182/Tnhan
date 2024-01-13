<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Tnhan182";
$dbname = "webgiamcantangcan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem có tham số iduser được chuyển qua không
if (isset($_GET['iduser'])) {
    $iduser = $_GET['iduser'];

    // Kiểm tra xem ID tồn tại trong cơ sở dữ liệu không
    $check_query = "SELECT * FROM user WHERE iduser=?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("i", $iduser);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Thực hiện truy vấn để xóa khách hàng từ bảng user
        $delete_user_query = "DELETE FROM user WHERE iduser=?";
        $delete_user_stmt = $conn->prepare($delete_user_query);
        $delete_user_stmt->bind_param("i", $iduser);

        if ($delete_user_stmt->execute()) {
            // Thực hiện truy vấn để xóa khách hàng từ bảng userinfo
            $delete_info_query = "DELETE FROM userinfo WHERE iduser=?";
            $delete_info_stmt = $conn->prepare($delete_info_query);
            $delete_info_stmt->bind_param("i", $iduser);

            if ($delete_info_stmt->execute()) {
                echo "Xóa khách hàng thành công!";
            } else {
                echo "Lỗi khi xóa khách hàng (userinfo): " . $delete_info_stmt->error;
            }

            $delete_info_stmt->close();
        } else {
            echo "Lỗi khi xóa khách hàng (user): " . $delete_user_stmt->error;
        }

        $delete_user_stmt->close();
    } else {
        echo "ID khách hàng không tồn tại trong cơ sở dữ liệu.";
    }

    $check_stmt->close();
} else {
    echo "Không có ID khách hàng được cung cấp.";
}

// Đóng kết nối
$conn->close();
?>
