<?php 

	session_start();
	include '../../config.php';
	$accountID = $_SESSION["AccountID"];
	$accountType = $_SESSION["AccountType"];
	$sql = "SELECT * FROM account WHERE AccountID = '$accountID'";
	$query = mysqli_query($conn, $sql);
	$dataUser = mysqli_fetch_array($user);

	$password = $dataUser["Password"];
	
	$passwordOld = $_POST["passwordOld"];
	$passwordNew = $_POST["passwordNew"];
	$rePassword = $_POST["rePassword"];
	if(isset($_POST["submit"])){
		if($passwordOld == $password ){
			if($passwordNew == $rePassword ){
				$sql = "UPDATE account SET Password = '$password' WHERE AccountID ='$accountID'";
				$query = mysqli_query($conn, $sql);
				if($query){
					$_SESSION["notice"] = "Đổi mật khẩu thành công!";
				}
				else{
					$_SESSION["notice"] = "Đổi mật khẩu Thất bại!";
				}
			}
			else{
				$_SESSION["notice"] = "Mật khẩu nhập lại không khớp!";
			}
		}
		else{
			 $_SESSION["notice"] = "Mật khẩu không chính xác!";
		}
		if($accountType==1){
			// về màn hình của admin
			header("location: ../html/admin/admin.php");
		}
		else{
			// về màn hình của sinh viên
			header("location: ../html/student/studentChangeProfile.php");
		}
	}
 ?>