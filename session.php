<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang login.php
if(!isset($_SESSION['login_id'])) {
    header("Location: login.php");
    exit();
}
$login_name = $_SESSION['login_id'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$login_time = date("Y-m-d H:i");

?>