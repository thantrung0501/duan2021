<?php 
	session_start();
 ?>
<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/resetpassword.css">
	</head>
<body class="reset_password">
	<div class="logo">
		<img src="../images/common/Logo-VNU-1995.jpg" style="max-width:35%;height:auto;">
		<p class="web-name">Đăng ký thi đánh giá năng lực
		<br>
		Đại học Quốc gia Hà Nội
		</p>
		<br>
		<h1>VNU <small>test center</small></h1>
	</div>
	<div class="email">
		<form action="../action/repassword_submit.php" method="POST">
			<h1>Đặt lại mật khẩu</h1>
			<label for="taikhoan">Email:</label><br>
			<input type="text" id="email" name="email">
			<input type="submit" name="submit" value="Gửi yêu cầu">
		</form>
	</div>
</body>
</html>