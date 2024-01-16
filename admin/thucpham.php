<?php
// Kết nối đến cơ sở dữ liệu
include_once('connection.php');

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
        echo "Thực phẩm đã được thêm thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>