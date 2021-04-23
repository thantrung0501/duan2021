<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="../css/signin.css">
	<script type=”text/javascript” src="/js/jquery-3.5.1.min.js"></script>
</head>
<body>
	
	<div class="login-partial">
		<div class="logo">
			<img src="../images/common/Logo-VNU-1995.jpg" style="max-width:40%;height:auto;">
			<p class="web-name">Đăng ký thi đánh giá năng lực</p>
			<p class="web-name">Đại học Quốc gia Hà Nội</p> 
			<h1>VNU<small>test center</small></h1>
		</div>


		<div class="sign-in-form">
			<form action="../action/signin_submit.php" method="POST">
			<h1>Đăng nhập</h1>
			<div class="notice" style="color: red;text-align: center;">
				<?php 	
					if(isset($_SESSION["notice"])){
						echo $_SESSION["notice"];
						unset($_SESSION['notice']);
					}
				 ?>
			</div>
			<div class="form-element">
				<label for="username">Tài khoản:</label>
			<input type="text" id="username" name="username">
			</div>
			<div class="form-element">
				<label for="password">Mật khẩu:</label>
				<input type="password" id="password" name="password">
				<a href="../html/resetpassword.html">Quên mật khẩu?</a>
			</div>
			<div class="form-element">
				<button class="btn-login" type="submit" value="" name="submit" onclick="send()">Đăng nhập</button>
			</div>
			<div class="sign-up-suggest">
				Chưa có tài khoản? Đăng ký ngay <a href="../html/signup.php">tại đây</a>
			</div>
		</form>  
		</div>
	</div>


</body>

<script type="text/javascript" src="../js/index.js"></script>
</html>