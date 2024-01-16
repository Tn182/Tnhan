<?php
// Kết nối CSDL (Thay thế thông tin kết nối của bạn)
$servername = "127.0.0.1";
$username = "root";
$password = "Tnhan182";
$dbname = "webgiamcantangcan";
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Kiểm tra xóa hoặc sửa
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'delete') {
        // Xử lý xóa bài tập
        $baitap_id = $_POST['baitap_id'];
        $sql_delete = "DELETE FROM baitapsuckhoe WHERE baitap_id = $baitap_id";

        if ($conn->query($sql_delete) === TRUE) {
            header("Location: quanlybaitap.php");
            exit();
        } else {
            echo "Lỗi khi xóa bài tập: " . $conn->error;
        }
    } elseif ($action == 'edit') {
        // Chuyển hướng đến trang sửa bài tập với ID tương ứng
        $baitap_id = $_POST['baitap_id'];
        header("Location: suabaitap.php?baitap_id=$baitap_id");
        exit();
    }
}

// Truy vấn lấy danh sách bài tập từ CSDL
$sql_select = "SELECT * FROM baitapsuckhoe";
$result = $conn->query($sql_select);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Bài Tập</title>
    <!-- Thêm các tệp CSS và thư viện khác nếu cần -->
    <style>
       body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
    text-align: center;
    margin-top: 20px;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    border: 1px solid #ddd;
    background-color: #fff;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

td form {
    display: flex;
    gap: 5px;
}

td form button {
    padding: 5px 10px;
    cursor: pointer;
}

 b{
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

b:hover {
    text-decoration: underline;
    color: #0056b3;
}
    </style>
</head>
<body 1>
    <h2>Danh Sách Bài Tập</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên Bài Tập</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>Video</th>
            <th>Thao Tác</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['ten_bai_tap']}</td>";
            echo "<td>{$row['mo_ta']}</td>";
            echo "<td>{$row['hinh_anh']}</td>";
            echo "<td>{$row['video']}</td>";
            echo "<td>
                    <form action='quanlybaitap.php' method='post'>
                        <input type='hidden' name='action' value='edit'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'>Sửa</button>
                    </form>
                    <form action='xoabaitap.php' method='post'>
                        <input type='hidden' name='action' value='delete'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\")'>Xóa</button>
                    </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Thêm nút hoặc liên kết để thêm bài tập mới -->
    <a href="thembaitap.php">Thêm Bài Tập Mới</a>

</body>
</html>
