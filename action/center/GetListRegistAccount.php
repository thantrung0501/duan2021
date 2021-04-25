<?php 
	session_start();
	include '../../config.php';
	$accountType = $_SESSION["AccountType"];
	// lấy tên, ngày sinh, ngày đăng ký tài khoản

	// chỉ có cục khảo thí mới có quyền xem danh sách tài khoản
	if($accountType == 1){
		$sql = "SELECT acd.AccountID, acd.FullName, acd.DateOfBirth, ac.AccountDate FROM accountdetail acd INNER JOIN account ac ON acd.AccountID = ac.AccountID WHERE ac.AccountType = 2 ORDER BY ac.AccountDate";

		$query = mysqli_query($conn, $sql);

		if(mysqli_num_rows($query) > 0){

			$listRegistAccount = mysqli_fetch_array($query);
			echo json_encode($listRegistAccount);
		}

	}


 ?>