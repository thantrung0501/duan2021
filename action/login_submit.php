<?php 

	session_start();
	include '../config.php';
   //nếu điền đủ thông tin và nhấn nút submit thì đi tiếp, nếu không thì văng cảnh báo điền đầy đủ thông tin
	if(isset($_POST["submit"])&& $_POST["username"]!='' && $_POST["password"]!=''){
		// lấy username 
		$username = $_POST["username"];
		//lấy password
		$password = $_POST["password"];	
		// mã hóa password bằng md5
		$password = md5($password);

		//truy vấn lấy dữ liệu
		$sql = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";
		$user = mysqli_query($conn, $sql);

			// nếu tồn tại user thì thực hiện 
			if(mysqli_num_rows($user) >0){
				$dataUser = mysqli_fetch_array($user);
				$_SESSION["user"] = $username;
				$_SESSION["AccountID"] = $dataUser["AccountID"];
				// check màn hình đăng nhập: 1 là của cục khảo thí, 2 là của thí sinh
				if($dataUser['AccountType']==1){
					// active vào màn hình đăng nhập của cục khảo thí
				}
				else{
					//active vào màn hình đăng nhập của thí sinh
					header("location: ../html/student/studentHomePage.php");
				}
			}
			else{
				// nếu không có data thì không có tài khoản đăng nhập
				$_SESSION["notice"]  =  "thông tin tài khoản mật khẩu không chính xác";
				header("location: ../login.php");
				
			}
	
	
	}
	// văng ra cảnh báo nếu không điển đủ thông tin vào ô đăng nhập
	else{
		$_SESSION["notice"]  =  "Vui lòng điền đầy đủ thông tin";
		header("location: ../login.php");
	}
	



 ?>