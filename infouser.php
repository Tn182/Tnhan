<?php
ob_start(); // Bắt đầu bộ đệm đầu ra
session_start();
?>
<?php
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (isset($_SESSION['iduser'])) {
            // Kiểm tra xem người dùng đã cập nhật thông tin hay chưa
            if (isset($_SESSION['updated'])) {
                if ($_SESSION['updated']) {
                    // Hiển thị thông báo đã cập nhật thông tin
                    echo '<p style="color: green;">Thông tin đã được cập nhật thành công!</p>';
                } else {
                    // Hiển thị thông báo chưa cập nhật thông tin
                    echo '<p style="color: red;">Bạn chưa cập nhật thông tin!</p>';
                }

                // Reset session variable to avoid showing the message on subsequent visits
                unset($_SESSION['updated']);
            }

            // Hiển thị form nhập thông tin
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        form {
    max-width: 400px; /* Giảm chiều rộng của biểu mẫu */
    margin: auto;
    padding: 20px; /* Thêm padding để tạo khoảng trắng xung quanh biểu mẫu */
    border: 1px solid #ccc; /* Thêm đường viền để phân biệt biểu mẫu từ nền */
    border-radius: 8px; /* Bo tròn góc của biểu mẫu */
}

h1 {
    text-align: center; /* Canh giữa tiêu đề */
}

label {
    display: block;
    margin-bottom: 6px; /* Giảm khoảng cách dưới mỗi nhãn */
}

input,
select,
button {
    width: 100%; /* Làm cho các trường nhập và nút giữa chiều rộng của biểu mẫu */
    padding: 10px; /* Tăng kích thước padding cho trường nhập và nút */
    margin-bottom: 10px; /* Giảm khoảng cách dưới mỗi trường nhập và nút */
    box-sizing: border-box; /* Bảo đảm rằng kích thước tổng cộng bao gồm padding và border */
}

button {
    background-color: #4CAF50; /* Màu nền cho nút */
    color: white; /* Màu chữ cho nút */
    border: none;
    border-radius: 4px; /* Bo tròn góc của nút */
    cursor: pointer;
}

button:hover {
    background-color: #45a049; /* Màu nền khi di chuột qua nút */
}
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 300px; /* Độ rộng của khung nhập liệu */
            padding: 20px;
            border: 1px solid #ccc; /* Viền xung quanh khung nhập liệu */
            border-radius: 8px; /* Bo tròn góc của khung nhập liệu */
        }

        h1 {
            text-align: center;
            color: #007bff; /* Màu chữ là màu xanh dương */
            font-size: 24px; /* Kích thước chữ là 24px */
            margin-bottom: 20px; /* Khoảng cách dưới là 20px */
        }
    </style>
</head>
<body id="top">
    <main>
    <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="dashboarduser.php">
                    <img src="image/logo.png" alt="Logo" class="logo-img">
                    <span>Healthy S</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="dashboard.html">Trang Chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="nutritionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dinh Dưỡng</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="nutritionDropdown">
                                <li><a class="dropdown-item" href="topics-listing.html">Nam</a></li>
                                <li><a class="dropdown-item" href="contact.html">Nữ</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="exerciseDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">BÀI TẬP</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="exerciseDropdown">
                                <li><a class="dropdown-item" href="topics-listing.html">THẤP</a></li>
                                <li><a class="dropdown-item" href="contact.html">TRUNG BÌNH</a></li>
                                <li><a class="dropdown-item" href="contact.html">CAO</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="news.html">Tin Tức</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Hỗ Trợ</a>
                        </li>
                    </ul>

                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Chào
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="dashboard.php">Xem Thông Tin Người Dùng</a></li>
                            <li><a class="dropdown-item" href="infouser.html">Cập Nhật Thông Tin</a></li>
                            <li><a class="dropdown-item" href="logout.php">Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
           
            <form action="process_info.php" method="post">
            <h1>Nhập Thông Tin Người Dùng</h1>
                <label for="height">Chiều cao (cm):</label>
                <input type="number" name="height" required><br>

                <label for="weight">Cân nặng (kg):</label>
                <input type="number" name="weight" required><br>

                <label for="gender">Giới tính:</label>
                <select name="gender" required>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                    <option value="other">Khác</option>
                </select><br>

                <label for="birthdate">Ngày sinh:</label>
                <input type="date" name="birthdate" required><br>

                <button type="submit">Lưu thông tin</button>
            </form>
       
    </main>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
<?php
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            header("Location: login_register.html");
            exit();
        }
        ?>
<?php
ob_end_flush(); // Gửi tất cả đầu ra đến trình duyệt
?>