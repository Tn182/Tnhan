<?php
// Kết nối đến cơ sở dữ liệu
include_once('connection.php');

// Kiểm tra xem biểu mẫu có được gửi đi không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] == 'edit') {
        // Lấy dữ liệu từ biểu mẫu để sửa đổi
        $food_id = $_POST['food_id'];
        $food_name = $_POST['food_name'];
        $calories = $_POST['calories'];
        $protein = $_POST['protein'];
        $carbs = $_POST['carbs'];
        $fat = $_POST['fat'];

        // Thực hiện câu lệnh SQL cập nhật dữ liệu
        $sql = "UPDATE food SET
                food_name = '$food_name',
                calories = '$calories',
                protein = '$protein',
                carbs = '$carbs',
                fat = '$fat'
                WHERE food_id = '$food_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($_POST['action'] == 'delete') {
        // Lấy food_id từ biểu mẫu để xóa
        $food_id = $_POST['food_id'];

        // Thực hiện câu lệnh SQL xóa dữ liệu
        $sql = "DELETE FROM food WHERE food_id = '$food_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Xóa thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Lấy danh sách thực phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM food";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Thực Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff   ;
            color: white;
        }

        form {
            width: 50%;
            margin: auto;
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            color: #007bff;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>Cập Nhật Thực Phẩm</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên Thực Phẩm</th>
            <th>Calo</th>
            <th>Protein</th>
            <th>Carbs</th>
            <th>Chất Béo</th>
            <th>Thao Tác</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['food_id']}</td>";
                echo "<td>{$row['food_name']}</td>";
                echo "<td>{$row['calories']}</td>";
                echo "<td>{$row['protein']}</td>";
                echo "<td>{$row['carbs']}</td>";
                echo "<td>{$row['fat']}</td>";
                echo "<td>
                        <form action='quanlythucpham.php' method='post'>
                            <input type='hidden' name='action' value='edit'>
                            <input type='hidden' name='food_id' value='{$row['food_id']}'>
                            <button type='submit'>Sửa</button>
                        </form>
                        <form action='quanlythucpham.php' method='post'>
                            <input type='hidden' name='action' value='delete'>
                            <input type='hidden' name='food_id' value='{$row['food_id']}'>
                            <button type='submit' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\")'>Xóa</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>

    <?php
    if (isset($_GET['food_id'])) {
        $food_id = $_GET['food_id'];
        $sql = "SELECT * FROM food WHERE food_id = '$food_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="quanlythucpham.php" method="post">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>">

                <label for="food_name">Tên Thực Phẩm:</label>
                <input type="text" name="food_name" value="<?php echo $row['food_name']; ?>" required><br>

                <label for="calories">Calo:</label>
                <input type="number" name="calories" value="<?php echo $row['calories']; ?>" required><br>

                <label for="protein">Protein:</label>
                <input type="number" name="protein" value="<?php echo $row['protein']; ?>" required><br>

                <label for="carbs">Carbs:</label>
                <input type="number" name="carbs" value="<?php echo $row['carbs']; ?>" required><br>

                <label for="fat">Chất Béo:</label>
                <input type="number" name="fat" value="<?php echo $row['fat']; ?>" required><br>

                <button type="submit">Lưu Thay Đổi</button>
            </form>

            <form action="quanlythucpham.php" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>">
                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa Thực Phẩm</button>
            </form>
    <?php
        }
    }
    ?>

    <a href="index.php">Quay Lại</a>
</body>

</html>
