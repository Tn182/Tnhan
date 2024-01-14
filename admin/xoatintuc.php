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
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];

    // Câu truy vấn xóa
    $sqlDelete = "DELETE FROM news WHERE id = $idToDelete";
    
    // Thực hiện truy vấn xóa
    if ($conn->query($sqlDelete) === TRUE) {
        echo "Xóa tin tức thành công!";
    } else {
        echo "Lỗi khi xóa tin tức: " . $conn->error;
        die($conn->error);
    }
}

// Truy vấn SQL để lấy tin tức từ cơ sở dữ liệu
$sqlSelect = "SELECT * FROM news ORDER BY created_at DESC";
$result = $conn->query($sqlSelect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Tin Tức</title>
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

<?php
if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>ID</th><th>Tiêu đề</th><th>Nội dung</th><th>Ảnh</th><th>Ngày tạo</th><th>Xóa</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["title"] . '</td>';
        echo '<td>' . $row["content"] . '</td>';
        echo '<td><img src="' . $row["image"] . '" style="max-width: 100px; max-height: 100px;" alt=""></td>';
        echo '<td>' . $row["created_at"] . '</td>';
        echo '<td><a href="?delete=' . $row["id"] . '" onclick="return confirm(\'Bạn có chắc muốn xóa tin tức này không?\')">Xóa</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "Không có tin tức nào.";
}
?>

</body>
</html>

<?php
// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
