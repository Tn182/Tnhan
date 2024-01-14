<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Tnhan182";
$dbname = "webgiamcantangcan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy danh sách khách hàng từ cơ sở dữ liệu
$query = "SELECT * FROM user";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách Khách Hàng - Health S</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>

    <h2>Cập Nhật Thông Tin Khách Hàng</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Họ và Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Thao Tác</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['iduser']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>
                            <a href='capnhat.php?iduser={$row['iduser']}'>Sửa</a>
                            <a href='xoa.php?iduser={$row['iduser']}' onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>

</body>

</html>
