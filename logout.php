<?php
session_start();

// Hủy toàn bộ session
session_destroy();

// Chuyển hướng về trang đăng nhập sau khi đăng xuất
header("Location: index.php");
exit();
?>
