<?php
include("connection.php"); // Kết nối đến cơ sở dữ liệu

// Lấy danh sách người dùng
$query = "SELECT * FROM user";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Người Dùng - Health S</title>
</head>

<body>

    <h2>Danh sách Người Dùng</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                  </tr>";
        }
        ?>
    </table>

</body>

</html>
