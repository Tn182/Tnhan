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
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            margin-bottom: 20px; /* Điều chỉnh giá trị để thay đổi khoảng cách */
        }

        /* Navbar styling */
        nav.navbar {
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-brand span {
            color: white;
        }

        .navbar-nav a.nav-link {
            color: white !important;
        }

        .dropdown-menu {
            background-color: #f8f9fa;
        }

        .dropdown-menu a {
            color: #333;
        }

        .dropdown-menu a:hover {
            background-color: #007bff;
            color: white;
        }

        /* Form styling */
        form {
    max-width: 400px;
    margin: auto;
    margin-top: 80px; /* Điều chỉnh giá trị để thay đổi khoảng cách */
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


        h1 {
            text-align: center;
            color: #007bff;
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Main styling */
        main {
            padding: 40px 0;
        }

        /* Footer styling */
        footer {
            padding: 20px 0;
            background-color: #f8f9fa;
            text-align: center;
        }

        /* Responsive styling */
        @media (max-width: 767px) {
            form {
                max-width: 100%;
            }
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
                            <a class="nav-link click-scroll" href="dashboarduser.php">Trang Chủ</a>
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