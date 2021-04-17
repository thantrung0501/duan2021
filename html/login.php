<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="./css/login.css">
	<script type=”text/javascript” src="/js/jquery-3.5.1.min.js"></script>
</head>
<body>
	
	<div class="login-partial">
		<div class="logo">
			<img src="./images/common/Logo-VNU-1995(1).jpg" style="max-width:40%;height:auto;">
			<p>Đăng ký thi đánh giá năng lực
			<br>
			Đại học Quốc gia Hà Nội
			</p>
			<br>
			<h5>VNU <small>test center</small></h5>
		</div>


		<div class="sign_in">
			<form action="./action/login_submit.php" method="POST">
			<p>Đăng nhập</p>
			<div class="notice">
				<?php 	
					if(isset($_SESSION["notice"])){
						echo $_SESSION["notice"];
						unset($_SESSION['notice']);
					}
				 ?>
			</div>
			<label >Tài khoản:</label><br>
			<input type="text" id="username" name="username"><br>
			<label >Mật khẩu:</label><br>
			<input type="password" id="password" name="password"><br>
			<a href="ResetPassword.html">Quên mật khẩu</a><br>
			<button class="btn-login" type="submit" value="" name="submit">Đăng nhập</button>
			<br>
			<div class="dangky">
				<p>
				Chưa có tài khoản? Đăng ký ngay <a href="./html/signup.php"><button class="buttonLogin" id="signup" name="buttonLogin" type="button" >SIGN UP</button></a>
				</p>
			</div>
		</form>  
		</div>
	</div>


</body>

<script type="text/javascript" src="../js/index.js"></script>
</html>