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

if (isset($_SESSION['iduser'], $_POST['height'], $_POST['weight'], $_POST['gender'], $_POST['birthdate'])) {
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $iduser = $_SESSION['iduser'];

    $sqlCheckUpdate = "SELECT updated FROM userinfo WHERE iduser = ?";
    $stmtCheckUpdate = $conn->prepare($sqlCheckUpdate);
    $stmtCheckUpdate->bind_param("i", $iduser);
    $stmtCheckUpdate->execute();
    $stmtCheckUpdate->store_result();

    if ($stmtCheckUpdate->num_rows > 0) {
        $_SESSION['updated'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $sql = "INSERT INTO userinfo (iduser, height, weight, gender, birthdate, updated) VALUES (?, ?, ?, ?, ?, true)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiss", $iduser, $height, $weight, $gender, $birthdate);

        try {
            $stmt->execute();
            $_SESSION['updated'] = true;

            // Tính BMI và xác định tình trạng sức khỏe
            $bmi = $weight / (($height / 100) ** 2);
            echo "Thông tin đã được cập nhật thành công. BMI của bạn là: " . number_format($bmi, 2);

            // Xác định tình trạng sức khỏe
            if ($bmi < 18.5) {
                echo " - Dưới cân";
            } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                echo " - Bình thường";
            } elseif ($bmi >= 25 && $bmi < 29.9) {
                echo " - Thừa cân";
            } else {
                echo " - Béo phì";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        $stmt->close();
    }

    $stmtCheckUpdate->close();
    if ($_SESSION['updated']) {
        echo '<br><a href="dashboard.php">Xem Thông Tin Người Dùng</a>';
    }
} else {
    header("Location: login_register.html");
    exit();
}

$conn->close();
?>
