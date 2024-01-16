<?php
session_start();

// Include file kết nối CSDL
include_once('connection.php');



// Xử lý đăng nhập khi form được submit
// Kiểm tra dữ liệu post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Sử dụng Prepared Statements để tránh SQL Injection
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lưu session và chuyển hướng đến trang index.php
        $row = $result->fetch_assoc();
        $_SESSION['admin_id'] = $row['admin_id'];
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Thông tin đăng nhập không chính xác.";
    }
}


// Đóng kết nối CSDL
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="index.php" method="post">
					<span class="login100-form-title">
						ADMIN
					</span>

					<div class="wrap-input100 validate-input" data-validate="Tài khoản không hợp lệ">
        <input class="input100" type="text" id="username" name="username" placeholder=" TÀI KHOẢN " required>
						
					</div>

					<div class="wrap-input100 validate-input" data-validate="Mật khẩu không hợp lệ">
        <input class="input100" type="password" id="password" name="password" placeholder="MẬT KHẨU" required>
						
					</div>
					<div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            ĐĂNG NHẬP
        </button>
    </div>

					
					</div>

				
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>