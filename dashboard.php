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
            // Hiển thị thông tin người dùng
            echo "<h1>Chào mừng bạn đến trang Dashboard, " . $row['username'] . "!</h1>";
            echo "<p>Chiều cao: " . $row['height'] . " cm</p>";
            echo "<p>Cân nặng: " . $row['weight'] . " kg</p>";
            echo "<p>Giới tính: " . $row['gender'] . "</p>";
            echo "<p>Ngày sinh: " . $row['birthdate'] . "</p>";
            echo "<p>Đã cập nhật thông tin: Có</p>";

            // Hiển thị tình trạng cân nặng
            $bmi = $row['weight'] / (($row['height'] / 100) ** 2);
            echo "<p>Tình trạng cân nặng: ";
            if ($bmi < 18.5) {
                echo "Dưới cân";
            } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                echo "Bình thường";
            } elseif ($bmi >= 25 && $bmi < 29.9) {
                echo "Thừa cân";
            } else {
                echo "Béo phì";
            }
            echo "</p>";
        } else {
            // Nếu chưa cập nhật, chuyển hướng đến trang nhập thông tin
            header("Location: infouser.php");
            exit();
        }
    } else {
        // Nếu không tìm thấy thông tin người dùng, chuyển hướng đến trang nhập thông tin
        header("Location: infouser.html");
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

?>
