<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Tnhan182";
$dbname = "webgiamcantangcan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    processCompletedExercises($conn);
}

$result = $conn->query("SELECT id, ten_bai_tap, mo_ta, hinh_anh, muc_do, ngay_tao, video FROM baitapsuckhoe");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Bài tập Sức khỏe</title>
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
}

.navbar {
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar-brand img {
    height: 40px;
    margin-right: 10px;
}

.navbar-brand span {
    font-weight: 600;
    font-size: 1.2rem;
}

.navbar-nav .nav-link {
    color: #343a40 !important;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.dropdown-menu a {
    color: #343a40;
}

.dropdown-menu a:hover {
    background-color: #f8f9fa;
}

.exercise {
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
}

h2 {
    color: #007bff;
}

.completed-checkbox {
    margin-top: 15px;
}

form {
    margin-top: 20px;
}

/* Responsive Styles */
@media (max-width: 991px) {
    .navbar-nav {
        margin-top: 10px;
        text-align: center;
    }

    .navbar-toggler {
        margin: 10px 0;
    }

    .dropdown-menu {
        width: 100%;
        text-align: center;
        box-shadow: none;
    }
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

<?php
displayExercises($result);

$conn->close();
?>

<!-- Biểu mẫu để gửi dữ liệu -->
<form method="post">
    <input type="submit" value="Lưu hoàn thành">
</form>
</main>
    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.bundle.min.js'></script>
    <script src='js/jquery.sticky.js'></script>
    <script src='js/click-scroll.js'></script>
    <script src='js/custom.js'></script>
</body>
</html>

<?php
function displayExercises($result)
{
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="exercise">';
            echo '<h2>' . htmlspecialchars($row['ten_bai_tap']) . '</h2>';
            echo '<p><strong>Mô tả:</strong> ' . htmlspecialchars($row['mo_ta']) . '</p>';
            echo '<p><strong>Mức độ:</strong> ' . htmlspecialchars($row['muc_do']) . '</p>';
            echo '<p><strong>Ngày tạo:</strong> ' . htmlspecialchars($row['ngay_tao']) . '</p>';
            echo '<img src="admin/' . htmlspecialchars($row['hinh_anh']) . '" alt="Hình ảnh bài tập">';

            $videoLink = htmlspecialchars($row['video']);
            if (strpos($videoLink, 'youtube.com') !== false || strpos($videoLink, 'youtu.be') !== false) {
                echo '<p>Đường link video: <a href="' . $videoLink . '" target="_blank">' . $videoLink . '</a></p>';
            } else {
                echo '<p>Liên kết video không hợp lệ.</p>';
            }

            echo '<div class="completed-checkbox">';
            echo '<input type="checkbox" name="completed[]" value="' . htmlspecialchars($row['id']) . '"> Đánh dấu hoàn thành';
            echo '</div>';

            echo '</div>';
        }
    } else {
        echo "Không có dữ liệu bài tập sức khỏe.";
    }
}

function processCompletedExercises($conn)
{
    if (isset($_POST['completed']) && is_array($_POST['completed'])) {
        echo '<h2>Bài tập đã hoàn thành:</h2>';
        echo '<ul>';

        foreach ($_POST['completed'] as $exerciseId) {
            // Thực hiện xử lý khi bài tập được đánh dấu hoàn thành
            // Ví dụ: Cập nhật cơ sở dữ liệu, lưu trạng thái, gửi thông báo, v.v.
            echo '<li>Bài tập ID ' . htmlspecialchars($exerciseId) . '</li>';
        }

        echo '</ul>';
    }
}
?>
