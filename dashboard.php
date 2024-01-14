<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "Tnhan182";
$dbname = "webgiamcantangcan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['iduser'])) {
    $iduser = $_SESSION['iduser'];

    // Truy vấn thông tin người dùng từ cơ sở dữ liệu
    $sql = "SELECT * FROM userinfo WHERE iduser = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $iduser);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Kiểm tra xem thông tin đã được cập nhật hay chưa
        if ($row['updated']) {
            // Lưu tên người dùng vào biến $userName
            $userName = $row['iduser'];

            // Tính toán BMI
            $bmi = $row['weight'] / (($row['height'] / 100) ** 2);
            
            // Hiển thị thông tin người dùng
            echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Dashboard</title>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap' rel='stylesheet'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/bootstrap-icons.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
</head>
<body id='top'>
<main>
    <nav class='navbar navbar-expand-lg'>
        <div class='container'>
            <a class='navbar-brand' href='dashboard.html'>
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
                        Chào $userName
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

    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-md-8 text-center'>
                <h1 class='mb-4'>Chào mừng bạn đến trang Dashboard, $userName!</h1>
                <p>Chiều cao: {$row['height']} cm</p>
                <p>Cân nặng: {$row['weight']} kg</p>
                <p>Giới tính: {$row['gender']}</p>
                <p>Ngày sinh: {$row['birthdate']}</p>
                <p>Đã cập nhật thông tin: Có</p>
                <p>Tình trạng cân nặng: ";
            
            if ($bmi < 18.5) {
                echo "Dưới cân";
            } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                echo "Bình thường";
            } elseif ($bmi >= 25 && $bmi < 29.9) {
                echo "Thừa cân";
            } else {
                echo "Béo phì";
            }
            
            echo " (BMI: " . round($bmi, 2) . ")</p>
            </div>
        </div>
    </div>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.bundle.min.js'></script>
    <script src='js/jquery.sticky.js'></script>
    <script src='js/click-scroll.js'></script>
    <script src='js/custom.js'></script>
</body>
</html>";
        } else {
            // Nếu chưa cập nhật, chuyển hướng đến trang nhập thông tin
            header("Location: infouser.php");
            exit();
        }
    } else {
        // Nếu không tìm thấy thông tin người dùng, chuyển hướng đến trang nhập thông tin
        header("Location: infouser.php");
        exit();
    }

    $stmt->close();
} else {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: login_register.html");
    exit();
}

$conn->close();
?>
</main>

<!-- JAVASCRIPT FILES -->
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.bundle.min.js'></script>
<script src='js/jquery.sticky.js'></script>
<script src='js/click-scroll.js'></script>
<script src='js/custom.js'></script>
</body>
</html>