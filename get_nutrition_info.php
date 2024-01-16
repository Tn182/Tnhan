<?php
// Kết nối đến cơ sở dữ liệu
include_once('connect.php');

if (isset($_GET['food_id'])) {
    $foodId = $_GET['food_id'];

    // Lấy thông tin dinh dưỡng của thực phẩm từ cơ sở dữ liệu
    $sql = "SELECT * FROM food WHERE food_id = $foodId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nutritionInfo = array(
            'food_name' => $row['food_name'],
            'calories' => $row['calories'],
            'protein' => $row['protein'],
            'carbs' => $row['carbs'],
            'fat' => $row['fat']
        );

        echo json_encode($nutritionInfo);
    }
}

$conn->close();
?>
