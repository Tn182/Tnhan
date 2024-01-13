<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Tnhan182";
$dbname = "webgiamcantangcan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy danh sách khách hàng từ cơ sở dữ liệu sử dụng prepared statement
$query = "SELECT * FROM user";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách Khách Hàng</title>
</head>

<body>

    <h2>Danh sách Khách Hàng</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Họ và Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <!-- Thêm các cột khác nếu cần -->
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['iduser']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <!-- Thêm các cột khác nếu cần -->
                  </tr>";
        }
        ?>
    </table>

</body>

</html>

<?php
// Đóng kết nối
$conn->close();
?>
