<?php 
// hàm lấy danh sách group đăng ký tài khoản
	include '../../config.php';

	$sql = "SELECT DISTINCT account.GroupDate from account WHERE account.AccountType = 2 ORDER BY account.GroupDate DESC";
	$query = mysqli_query($conn, $sql);

	if(mysqli_num_rows($query) > 0){

		$listGroupAccount = mysqli_fetch_array($query);
		echo json_encode($listGroupAccount);
	}

 ?>