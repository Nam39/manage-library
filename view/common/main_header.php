


<div id="sticky-wrapper" class="sticky-wrapper"><header class="site-navbar js-sticky-header site-navbar-target" role="banner">
<div class="container">
<div class="row align-items-center position-relative">
<div class="site-logo">
<a href="/manage-library/view/home.php" class="text-black"><span class="text-primary">Quản lý thư viện</span></a>
</div>
	<?php
	//session_start();

	// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang login.php
	if(isset($_SESSION['login_id'])) {
		$login_name = $_SESSION['login_id'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$login_time = date("Y-m-d H:i");
		
		include 'child_header.php';
	}
	
	?>

	
</div>
</div>
</header>
</div>
