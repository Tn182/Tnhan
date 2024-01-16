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
