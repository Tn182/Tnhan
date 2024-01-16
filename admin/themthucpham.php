<?php
// Bao gồm tệp kết nối cơ sở dữ liệu của bạn ở đây
include_once('connection.php');

// Lấy danh sách các danh mục từ cơ sở dữ liệu
$sql_categories = "SELECT category_id, category_name FROM food_category";
$result_categories = $conn->query($sql_categories);

// Kiểm tra xem biểu mẫu có được gửi đi không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $food_name = $_POST['food_name'];
    $category_id = $_POST['category_id'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $carbs = $_POST['carbs'];
    $fat = $_POST['fat'];

    // Thực hiện câu lệnh SQL chèn dữ liệu
    $sql = "INSERT INTO food (food_name, category_id, calories, protein, carbs, fat)
            VALUES ('$food_name', '$category_id', '$calories', '$protein', '$carbs', '$fat')";

    if ($conn->query($sql) === TRUE) {
        echo "Mục thức ăn đã được thêm thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mục Thức Ăn</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #333;
}

input,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <h2>Thêm Mục Thức Ăn</h2>
    <form action="thucpham.php" method="post">
        <label for="food_name">Tên Thức Ăn:</label>
        <input type="text" name="food_name" required><br>

        <label for="category_id">Danh Mục:</label>
        <select name="category_id" required>
            <?php
            // Hiển thị danh sách danh mục từ cơ sở dữ liệu
            while ($row = $result_categories->fetch_assoc()) {
                echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
            }
            ?>
        </select><br>

        <label for="calories">Calo:</label>
        <input type="number" name="calories" required><br>

        <label for="protein">Protein:</label>
        <input type="number" name="protein" required><br>

        <label for="carbs">Carbs:</label>
        <input type="number" name="carbs" required><br>

        <label for="fat">Chất Béo:</label>
        <input type="number" name="fat" required><br>

        <button type="submit">Thêm Mục Thức Ăn</button>
    </form>
</body>
</html>
