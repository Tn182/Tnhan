<?php
// Kết nối đến cơ sở dữ liệu
include_once('connect.php');

// Lấy danh sách thực phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM food";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Chỉ Số Dinh Dưỡng</title>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap' rel='stylesheet'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/bootstrap-icons.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
    <style>
   body {
    font-family: 'Montserrat', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
}
.container{
    background-color: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
    position: relative;
    overflow: hidden;
}
.container2 {
    max-width: 800px;
    margin: 100px auto 20px;
    padding: 20px;
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #007bff;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
}

.food-quantity {
    width: 50px;
}

#calculateBtn {
    margin-top: 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

#selectedFoods {
    margin-top: 20px;
}

.nutrition-info {
    color: #28a745;
}

p {
    font-weight: bold;
    margin-bottom: 5px;
}

</style>
</head>
<body id="top">
    <main>
    <nav class='navbar navbar-expand-lg'>
        <div class='container'>
            <a class='navbar-brand' href='dashboarduser.php'>
                <img src='image/logo.png' alt='Logo' class='logo-img'>
                <span>Healthy S</span>
            </a>

            <div class='d-lg-none ms-auto me-4'>
                <a href='#top' class='navbar-icon bi-person smoothscroll'></a>
            </div>

            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-lg-5 me-lg-auto'>
                    <li class='nav-item'>
                        <a class='nav-link click-scroll' href='dashboard.html'>Trang Chủ</a>
                    </li>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarLightDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Dinh Dưỡng</a>

                        <ul class='dropdown-menu dropdown-menu-light' aria-labelledby='navbarLightDropdownMenuLink'>
                            <li><a class='dropdown-item' href='topics-listing.html'>Nam</a></li>

                            <li><a class='dropdown-item' href='contact.html'>Nữ</a></li>
                        </ul>
                    </li>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarLightDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>BÀI TẬP</a>

                        <ul class='dropdown-menu dropdown-menu-light' aria-labelledby='navbarLightDropdownMenuLink'>
                            <li><a class='dropdown-item' href='topics-listing.html'>THẤP</a></li>
                            <li><a class='dropdown-item' href='contact.html'>TRUNG BÌNH</a></li>
                            <li><a class='dropdown-item' href='contact.html'>CAO</a></li>
                        </ul>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link click-scroll' href='news.html'>Tin Tức</a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link click-scroll' href='#section_5'>Hỗ Trợ</a>
                    </li>
                </ul>

                <div class='dropdown'>
                    <a class='btn dropdown-toggle' href='#' role='button' id='userDropdown' data-bs-toggle='dropdown' aria-expanded='false'>
                        Chào 
                    </a>

                    <ul class='dropdown-menu' aria-labelledby='userDropdown'>
                        <li><a class='dropdown-item' href='dashboard.php'>Xem Thông Tin Người Dùng</a></li>
                        <li><a class='dropdown-item' href='infouser.php'>Cập Nhật Thông Tin</a></li>
                        <li><a class='dropdown-item' href='logout.php'>Đăng Xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container2">
            <h2>Chỉ Số Dinh Dưỡng</h2>

            <form id="nutritionForm">
                <table>
                    <thead>
                        <tr>
                            <th>Chọn</th>
                            <th>Thực Phẩm</th>
                            <th>Số Lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='food_ids[]' value='{$row['food_id']}'></td>";
                            echo "<td>{$row['food_name']}</td>";
                            echo "<td><input type='number' class='food-quantity' name='food_quantities[]' value='1' min='1' required></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No food available</td></tr>";
                    }
                    ?>
                 </tbody>
                </table>

                <button type="button" id="calculateBtn" onclick="calculateNutrition()">Tính Chỉ Số Dinh Dưỡng</button>
            </form>

            <div id="selectedFoods"></div>
        </div>
    <script>
   function calculateNutrition() {
    var checkboxes = document.querySelectorAll('input[name="food_ids[]"]');
    var quantities = document.querySelectorAll('.food-quantity');
    var selectedFoodsDiv = document.getElementById("selectedFoods");

    var selectedFoodIds = [];
    var selectedQuantities = [];

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            selectedFoodIds.push(checkboxes[i].value);
            selectedQuantities.push(quantities[i].value);
        }
    }

    if (selectedFoodIds.length > 0) {
        // Xóa nội dung cũ trước khi thêm nội dung mới
        selectedFoodsDiv.innerHTML = "";

        var totalNutrition = {
            calories: 0,
            protein: 0,
            carbs: 0,
            fat: 0
        };

        Promise.all(selectedFoodIds.map((foodId, index) => {
            return fetch(`get_nutrition_info.php?food_id=${foodId}`)
                .then(response => response.json())
                .then(nutritionInfo => {
                    var quantity = selectedQuantities[index];

                    // Hiển thị chỉ số dinh dưỡng
                    var nutritionHTML = "<div class='nutrition-info'>";
                    nutritionHTML += "<p>" + nutritionInfo.food_name + ":</p>";
                    nutritionHTML += "<p>Calo: " + (nutritionInfo.calories * quantity).toFixed(2) + " kcal</p>";
                    nutritionHTML += "<p>Protein: " + (nutritionInfo.protein * quantity).toFixed(2) + " g</p>";
                    nutritionHTML += "<p>Carbs: " + (nutritionInfo.carbs * quantity).toFixed(2) + " g</p>";
                    nutritionHTML += "<p>Chất Béo: " + (nutritionInfo.fat * quantity).toFixed(2) + " g</p>";
                    nutritionHTML += "</div>";

                    selectedFoodsDiv.innerHTML += nutritionHTML;

                    // Cộng dồn chỉ số dinh dưỡng
                    totalNutrition.calories += parseFloat(nutritionInfo.calories * quantity);
                    totalNutrition.protein += parseFloat(nutritionInfo.protein * quantity);
                    totalNutrition.carbs += parseFloat(nutritionInfo.carbs * quantity);
                    totalNutrition.fat += parseFloat(nutritionInfo.fat * quantity);

                    // Hiển thị tổng chỉ số sau khi đã lặp qua tất cả các thực phẩm đã chọn
                    if (index === selectedFoodIds.length - 1) {
                        var totalNutritionHTML = "<div class='nutrition-info'>";
                        totalNutritionHTML += "<h3>Tổng Chỉ Số Dinh Dưỡng Của Thực Phẩm Đã Chọn</h3>";
                        totalNutritionHTML += "<p>Calo: " + totalNutrition.calories.toFixed(2) + " kcal</p>";
                        totalNutritionHTML += "<p>Protein: " + totalNutrition.protein.toFixed(2) + " g</p>";
                        totalNutritionHTML += "<p>Carbs: " + totalNutrition.carbs.toFixed(2) + " g</p>";
                        totalNutritionHTML += "<p>Chất Béo: " + totalNutrition.fat.toFixed(2) + " g</p>";
                        totalNutritionHTML += "</div>";

                        selectedFoodsDiv.innerHTML += totalNutritionHTML;
                    }
                });
        }));
    } else {
        alert("Vui lòng chọn ít nhất một thực phẩm.");
    }
}

</script>
</main>
    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.bundle.min.js'></script>
    <script src='js/jquery.sticky.js'></script>
    <script src='js/click-scroll.js'></script>
    <script src='js/custom.js'></script>
</body>

</html>
